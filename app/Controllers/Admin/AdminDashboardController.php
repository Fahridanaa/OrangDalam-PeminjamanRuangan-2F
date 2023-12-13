<?php 

namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class AdminDashboardController extends Controller {

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
    }


    public function showDashboard(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/Admindashboard');
    }


}