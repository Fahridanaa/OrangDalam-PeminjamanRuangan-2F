<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class DashboardController extends Controller
{
    private Jadwal $jadwal;
    private Ruang $ruang;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->jadwal = new Jadwal();
        $this->ruang = new Ruang();
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

    public function showJadwalByRuangan($kodeRuang, $namaHari)
    {
        return $this->jadwal->getJadwalByRuangDanHari($kodeRuang, $namaHari);
    }


    public function denah($lantai, $bagian, $posisi)
    {
        $data = array();
        foreach ($this->ruang->show($lantai, $bagian, $posisi) as $item) {
            $data[$item['kode']] = 'disable';
        }
        return $data;
    }

    public function showDenah()
    {
        $this->view('user/dashboard');
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

}