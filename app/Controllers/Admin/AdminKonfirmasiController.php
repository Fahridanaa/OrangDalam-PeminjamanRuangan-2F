<?php 


namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class AdminKonfirmasiController extends Controller {

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
    }


    public function showKonfirmasiPinjamPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/konfirmasiPinjam');
    }

}