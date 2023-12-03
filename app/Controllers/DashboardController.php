<?php
namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;
class DashboardController extends Controller {
    public function showDashboard () :void {
        if (!(isset($_SESSION['username']))) {
            header('Location: /public/login');
            exit();
        }

        if ($_SESSION['role'] == 'admin') {
            $this->view('admin/dashboard');
        } else {
            $this->view('user/dashboard');
        }
    }
}