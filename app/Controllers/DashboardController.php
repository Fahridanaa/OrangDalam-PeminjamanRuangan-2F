<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;

class DashboardController extends Controller
{
    private Jadwal $jadwal;

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
    }

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

        if ($_SESSION['level'] == 'Admin') {
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

    public function showRequestProfile(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('user/profile');
    }

    // detail ruangan, tinggal href 
    public function showRequesDetailRuangan(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('user/detailRuangan');
    }



    public function showJadwalByRuangan($kodeRuang, $namaHari)
    {
        foreach ($this->jadwal->getJadwalByRuangDanHari($kodeRuang, $namaHari) as $value) {
            /*
             * value:
             * mulai, selesai, namaMK, namaDosen, namaKelas
             */
        }
    }
}