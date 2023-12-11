<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class MultiFormController extends Controller
{
    public static function showForm()
    {
        $step = $_GET['step'];
        switch ($step) {
            case 1:
                if (!isset($_SESSION['formPinjam'])) {
                    $_SESSION['formPinjam'] = array();
                }
                $contentFile = __DIR__ . '/../Views/user/form/category.php';
//                $_SESSION['formPinjam']['category'] = self::processForm1();
                break;
            case 2:
                if (isset($_GET['category'])) {
                    $category = $_GET['category'];
                    $contentFile = __DIR__ . '/../Views/user/form/' . $category . '.php';
                } else {
                    header('Location: /pinjam/form?step=1');
                    exit();
                }
                break;
            case 3:
                $contentFile = __DIR__ . '/../Views/user/form/pilihRuang.php';
                break;
            case 4:
                if (isset($_GET['category'])) {
                    $category = $_GET['category'];
                    $contentFile = __DIR__ . '/../Views/user/form/' . $category . 'Konfirmasi.php';
                } else {
                    header('Location: /pinjam/form?step=1');
                    exit();
                }
                break;
            case 5:
                if (!isset($_GET['category'])) {
                    header('Location: /pinjam/form?step=1');
                    exit();
                }
                if ($_GET['category'] == 'acara') {
                    if ($_SESSION['formPinjam']['urgent']) {
                        $message = 'Silahkan tunggu konfirmasi dari Admin';
                    } else {
                        $message = 'Silahkan upload surat peminjaman untuk <br> tahap selanjutnya';
                    }
                } else {
                    if ($_SESSION['level'] === 'mahasiswa') {
                        $message = 'Silahkan tunggu konfirmasi dari Ketua Kelas';
                    } else {
                        $message = 'Silahkan tunggu konfirmasi dari Dosen';
                    }
                }
                $contentFile = __DIR__ . '/../Views/user/form/done.php';
                break;
        }
        include __DIR__ . '/../Views/user/multiForm.php';

    }

//    public static function processForm1()
//    {
//        return $_GET['category'];
//    }
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
