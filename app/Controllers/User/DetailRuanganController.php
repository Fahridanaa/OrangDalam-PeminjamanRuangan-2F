<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;


use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class DetailRuanganController extends Controller
{
    private Jadwal $jadwal;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->jadwal = new Jadwal();
    }

    public function showDetailRuangan(): void
    {

        $kode = $_GET['kode'];
        if (!isset($kode)) {
            header('Location: /dashboard');
            exit;
        }

        $this->ensureUserIsLoggedIn();

        $this->view('user/detailRuangan');
    }

    public function getJadwal($ruang, $hari)
    {
        return $this->jadwal->getJadwalByRuangDanHari($ruang, $hari);
    }
}