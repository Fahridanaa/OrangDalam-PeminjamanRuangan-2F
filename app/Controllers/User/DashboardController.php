<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

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

}