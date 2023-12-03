<?php
namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class DashboardController extends Controller
{
    private function loginCheck(): bool
    {
        return isset($_SESSION['username']);
    }

    public function showDashboard(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        if ($_SESSION['role'] == 'admin') {
            $this->view('admin/dashboard');
        } else {
            $this->view('user/dashboard');
        }
    }
    public function showPinjamPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }
        $category = $_GET['category'] ?? 'default';

        $this->view('user/pinjam');
    }

    public function showInboxPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('user/inbox');
    }

    public function ShowHistoryPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('user/history');
    }

    public function ShowRequestPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('user/konfirmasiRuangan');
    }
}