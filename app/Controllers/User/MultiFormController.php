<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class MultiFormController extends Controller
{
    private $peminjaman;

    public function __construct()
    {
        $this->peminjaman = new Peminjaman();
    }

    public function showForm()
    {
        $step = $_GET['step'];
        switch ($step) {
            case 1:
                $this->handleStep1();
                break;
            case 2:
                $this->handleStep2();
                break;
            case 3:
                $this->handleStep3();
                break;
            case 4:
                $this->handleStep4();
                break;
            case 5:

                break;
            default:
                header('Location: /pinjam');
                exit();
        }
        include __DIR__ . '/../../Views/user/multiForm.php';
    }

    private function handleStep1()
    {
        if (!isset($_SESSION['formPinjam'])) {
            $_SESSION['formPinjam'] = array();
        }

        $selectedCategory = $this->processForm1();

        if (!isset($_GET['category']) || $selectedCategory === false) {
            header('Location: /pinjam/form?step=1');
            exit();
        }

        $_SESSION['formPinjam']['category'] = $selectedCategory;
        $contentFile = __DIR__ . '/../../Views/user/form/category.php';
    }

    private function handleStep2()
    {
        if (!isset($_GET['category'])) {
            header('Location: /pinjam/form?step=1');
            exit();
        }

        $category = $_GET['category'];
        $contentFile = __DIR__ . '/../../Views/user/form/' . $category . '.php';
    }

    private function handleStep3()
    {
        $contentFile = __DIR__ . '/../../Views/user/form/pilihRuang.php';
    }

    private function handleStep4()
    {
        if (!isset($_GET['category'])) {
            header('Location: /pinjam/form?step=1');
            exit();
        }

        $category = $_GET['category'];
        $contentFile = __DIR__ . '/../../Views/user/form/' . $category . 'Konfirmasi.php';
    }

    private function handleStep5()
    {
        if (!isset($_GET['category'])) {
            header('Location: /pinjam/form?step=1');
            exit();
        }
        $contentFile = __DIR__ . '/../../Views/user/form/done.php';
    }


    private function processForm1()
    {
        $selectedCategory = $_GET['category'];

        if (!in_array($selectedCategory, ['acara', 'matkul'])) {
            return false;
        }
        return $selectedCategory;
    }

//
//    public static function processForm2($category)
//    {
//        $dataForm = array();
//        if ($category == 'acara') {
//            $dataForm['lantai'] = $_POST['lantai'];
//            $dataForm['tanggal'] = $_POST['tanggal'];
//            $dataForm['jamMulai'] = $_POST['jamMulai'];
//            $dataForm['jamSelesai'] = $_POST['jamSelesai'];
//            $dataForm['urgent'] = $_POST['urgent'];
//            $dataForm['keterangan'] = $_POST['keterangan'];
//
//        }
//    }
}
