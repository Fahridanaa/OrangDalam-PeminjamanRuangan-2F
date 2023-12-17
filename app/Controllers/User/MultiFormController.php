<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class MultiFormController extends Controller
{
    private const FORM_STEP_1 = 1;
    private const FORM_STEP_2 = 2;
    private const FORM_STEP_3 = 3;
    private const FORM_STEP_4 = 4;
    private const FORM_STEP_5 = 5;
    private Peminjaman $peminjaman;

    public function __construct()
    {
        $this->peminjaman = new Peminjaman();
    }

    public function showForm()
    {
        $step = $_GET['step'];
        $contentFile = $this->getContentFileByStep($step);
        include __DIR__ . '/../../Views/user/multiForm.php';
    }

    private function getContentFileByStep(int $step): string
    {
        switch ($step) {
            case self::FORM_STEP_1:
                return __DIR__ . '/../../Views/user/form/category.php';
            case self::FORM_STEP_2:
                return __DIR__ . '/../../Views/user/form/' . $_SESSION['formPinjam']['category'] . '.php';
            case self::FORM_STEP_3:
                return __DIR__ . '/../../Views/user/form/pilihRuang.php';
            case self::FORM_STEP_4:
                return __DIR__ . '/../../Views/user/form/' . $_SESSION['formPinjam']['category'] . 'Konfirmasi.php';
            case self::FORM_STEP_5:
                return __DIR__ . '/../../Views/user/form/done.php';
        }
    }

    private function redirect($location): void
    {
        if (!headers_sent()) {
            header('Location: ' . $location);
            exit();
        }
    }

    public function handleForm()
    {
        $step = $_GET['step'];
        $stepHandlerMap = [
            1 => 'handleStep1',
            2 => 'handleStep2',
            3 => 'handleStep3',
            4 => 'handleStep4',
            5 => 'handleStep5',
        ];

        if (isset($stepHandlerMap[$step])) {
            $handler = $stepHandlerMap[$step];
            $this->$handler();
        } else {
            header('Location: /pinjam');
            exit();
        }
    }

    public function handleStep1()
    {
        if (!isset($_SESSION['formPinjam'])) {
            $_SESSION['formPinjam'] = array();
        }

        $formProcessed = $this->processForm1();
        if ($formProcessed) {
            $_SESSION['formPinjam']['step1Completed'] = true;
            $this->redirect('/pinjam/form?step=2');
        }

        $this->redirect('/pinjam/form?step=1');
    }

    private function processForm1(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['category'])) {
                $_SESSION['flash_message'] = "Category is required.";
                return false;
            }

            $selectedCategory = $_POST['category'];

            if (!in_array($selectedCategory, ['acara', 'matkul'])) {
                $_SESSION['flash_message'] = "Invalid category.";
                return false;
            }

            $_SESSION['formPinjam']['category'] = $selectedCategory;
            return true;
        }

        return false;
    }

    public function handleStep2()
    {
        $category = $_SESSION['formPinjam']['category'];

        switch ($category) {
            case 'acara':
                $formProcessed = $this->processForm2Acara();
                break;
            case 'matkul':
                $formProcessed = $this->processForm2Matkul();
                break;
            default:
                header('Location: /pinjam/form?step=1');
                exit();
        }

        if ($formProcessed) {
            $_SESSION['formPinjam']['step2Completed'] = true;
            $this->redirect('/pinjam/form?step=3');
        }

        $this->redirect('/pinjam/form?step=2');
    }

    private function processForm2Acara(): bool
    {
        if (!isset($_SESSION['formPinjam']['step1Completed'])) {
            header('Location: /pinjam/form?step=1');
            exit();
        }

        if (!$this->isRequestMethodPost()) {
            header('Location: /pinjam');
            return false;
        }

        $requiredFields = ['lantai', 'acara-keterangan', 'acara-tanggal', 'acara-jam-mulai', 'acara-jam-selesai'];
        foreach ($requiredFields as $field) {
            $_SESSION['formPinjam'][$field] = $this->sanitizeInput($_POST[$field]);
        }

        if (!$this->checkRequiredFields($requiredFields)) {
            return false;
        }

        $tandaPengenal = $_FILES['tanda-pengenal'];
        $uploadsDir = __DIR__ . '/../../../uploads/';
        $acaraDir = $uploadsDir . 'acara/';
        $tandaPengenalPath = $acaraDir . 'tanda-pengenal/' . $tandaPengenal['name'];

        $allowedFileTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
        if (!$this->handleUploadedFiles($tandaPengenal, $allowedFileTypes, $tandaPengenalPath)) {
            return false;
        }

        $urgent = filter_input(INPUT_POST, 'acara-urgent', FILTER_VALIDATE_BOOLEAN);
        if ($urgent) {
            if (!isset($_FILES['acara-bukti-urgent'])) {
                $this->setFailedMessage("Urgent proof file is required.");
                return false;
            }

            $buktiUrgent = $_FILES['acara-bukti-urgent'];
            $buktiUrgentPath = $acaraDir . 'bukti-urgent/' . $buktiUrgent['name'];

            if (!$this->handleUploadedFiles($buktiUrgent, $allowedFileTypes, $buktiUrgentPath)) {
                return false;
            }
        }
        return true;
    }

    private function processForm2Matkul(): bool
    {
        if (!isset($_SESSION['formPinjam']['step1Completed'])) {
            header('Location: /pinjam/form?step=1');
            exit();
        }

        if (!$this->isRequestMethodPost()) {
            header('Location: /pinjam');
            return false;
        }
        $requiredFields = ['lantai', 'matkul', 'tanggal-matkul', 'jam-mulai-matkul', 'jam-selesai-matkul', 'matkul-keterangan'];
        foreach ($requiredFields as $field) {
            $_SESSION['formPinjam'][$field] = $this->sanitizeInput($_POST[$field]);
        }
        if (!$this->checkRequiredFields($requiredFields)) {
            return false;
        }
        $tandaPengenal = $_FILES['tanda-pengenal'];
        if (!$tandaPengenal) {
            $this->setFailedMessage('Tanda Pengenal is required.', 'warn', 'warn');
            return false;
        }
        $uploadsDir = __DIR__ . '/../../../uploads/';
        $matkulDir = $uploadsDir . 'matkul/';
        $tandaPengenalPath = $matkulDir . 'tanda-pengenal/' . basename($tandaPengenal['name']);
        $allowedFileTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!$this->handleUploadedFiles($tandaPengenal, $allowedFileTypes, $tandaPengenalPath)) {
            return false;
        }
        return true;
    }

    public function handleStep3()
    {
        $formProcessed = $this->processForm3();

        if ($formProcessed) {
            $_SESSION['formPinjam']['step3Completed'] = true;
            $this->redirect('/pinjam/form?step=4');
        }

        $this->redirect('/pinjam/form?step=3');

    }

    private function processForm3(): bool
    {
        if (!isset($_SESSION['formPinjam']['step2Completed'])) {
            header('Location: /pinjam/form?step=2');
            exit();
        }
        if (!$this->isRequestMethodPost()) {
            if (!headers_sent()) {
                header('Location: /pinjam');
            }
            return false;
        }
        if (empty($_POST['rooms']) || !is_array($_POST['rooms'])) {

            $this->setFailedMessage('Ruangan harus dipilih', 'warn', 'warn');
            return false;
        }
        // reset ruangan array
        $_SESSION['formPinjam']['ruangan'] = array();
        foreach ($_POST['rooms'] as $room) {
            $_SESSION['formPinjam']['ruangan'][$room] = $this->sanitizeInput($room);
        }
        return true;
    }

    public function handleStep4()
    {
        $category = $_SESSION['formPinjam']['category'];

        switch ($category) {
            case 'acara':
                $formProcessed = $this->confirmationForm4Acara();
                break;
            case 'matkul':
                $formProcessed = $this->confirmation4Matkul();
                break;
            default:
                header('Location: /pinjam/form?step=1');
                exit();
        }

        if ($formProcessed) {
            $_SESSION['formPinjam']['step4Completed'] = true;
            $this->redirect('/pinjam/form?step=5');
        }

        $this->redirect('/pinjam/form?step=4');
    }

    private function confirmationForm4Acara()
    {
        if (!isset($_SESSION['formPinjam']['step3Completed'])) {
            header('Location: /pinjam/form?step=3');
            exit();
        }

        $data = [
            'event' => $_SESSION['formPinjam']['acara-tanggal'],
            'mulai' => $_SESSION['formPinjam']['acara-jam-mulai'],
            'selesai' => $_SESSION['formPinjam']['acara-jam-selesai'],
            'urgent' => ($_FILES['acara-bukti-urgent']['name']), //nama file jare arip
            'keterangan' => $_SESSION['formPinjam']['acara-keterangan'],
            'status' => 'Menunggu Konfirmasi',
            'nim' => $_SESSION['user']['nim'] ?? null,
            'nidn' => $_SESSION['user']['nidn'] ?? null,
            'tandaPengenal' => ($_FILES['tanda-pengenal']['name'])
        ];

        if ($_SESSION['formPinjam']['urgent']) {
            $message = 'Silahkan tunggu konfirmasi dari Admin';
        } else {
            $message = 'Silahkan uploads surat peminjaman untuk <br> tahap selanjutnya';
        }
        $_SESSION['formPinjam']['done'] = $message;

        if ($this->peminjaman->insert($data) > 0) {
            return true;
        }

        return false;
    }

    private function confirmation4Matkul()
    {
        if (!isset($_SESSION['formPinjam']['step3Completed'])) {
            header('Location: /pinjam/form?step=3');
            exit();
        }

        $data = []; //query buat mata kuliah belum ada

        if ($_SESSION['level'] === 'mahasiswa') {
            $message = 'Silahkan tunggu konfirmasi dari Ketua Kelas';
        } else {
            $message = 'Silahkan tunggu konfirmasi dari Dosen';
        }
        $_SESSION['formPinjam']['done'] = $message;
        if ($this->peminjaman->insert($data) > 0) {
            return true;
        }
        return false;
    }

    public function handleStep5()
    {
        if (!isset($_SESSION['formPinjam']['step4Completed'])) {
            header('Location: /pinjam/form?step=4');
            exit();
        }

        unset($_SESSION['formPinjam']);

        header('Location: /pinjam');
    }

    private function isRequestMethodPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    private function sanitizeInput(string $input): string
    {
        $input = trim($input);
        $input = stripslashes($input);
        return htmlspecialchars($input);
    }

    private function checkRequiredFields(array $requiredFields): bool
    {
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $this->setFailedMessage("$field is required.");
                return false;
            }
        }
        return true;
    }

    private function handleUploadedFiles(array $fileData, array $allowedExtensions, string $destination): bool
    {
        $fileExtension = mime_content_type($fileData['tmp_name']);

        if (!in_array($fileExtension, $allowedExtensions)) {
            $this->setFailedMessage("Invalid file type.");
            return false;
        }

        if (!move_uploaded_file($fileData['tmp_name'], $destination)) {
            $this->setFailedMessage("Failed to upload file.");
            return false;
        }

        return true;
    }

    private function setFailedMessage(string $message, string $type = 'error', string $color = 'danger'): void
    {
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message, 'color' => $color];
    }
}
