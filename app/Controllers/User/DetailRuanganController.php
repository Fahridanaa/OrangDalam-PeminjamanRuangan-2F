<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;


use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\JadwalAcara;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;
use OrangDalam\PeminjamanRuangan\Models\Fasilitas;

class DetailRuanganController extends Controller
{
    private Jadwal $jadwal;
    private Ruang $ruang;
    private Fasilitas $detailRuang;
    private JadwalAcara $jadwalAcara;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->jadwal = new Jadwal();
        $this->ruang = new Ruang();
        $this->detailRuang = new Fasilitas();
        $this->jadwalAcara = new JadwalAcara();
    }

    public function showDetailRuangan(): void
    {

        $kode = $_GET['kode'];
        if (!isset($kode)) {
            header('Location: /dashboard');
            exit;
        }

        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('user/detailRuangan');
    }

}