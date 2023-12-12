<?php 


namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class AdminDashboardController extends Controller {

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
    }

    private function loginCheck(): bool
    {
        return isset($_SESSION['username']);
    }

    public function showKonfirmasiPinjamPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/konfirmasiPinjam');
    }

    public function showInbox(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/inbox');
    }

    public function showHistory(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        } 
        

        $this->view('admin/history');
    }


}