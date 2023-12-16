<?php 


namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class AdminHistoryController extends Controller {

    private Peminjaman $peminjaman;

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
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