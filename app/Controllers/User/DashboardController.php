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
            $data[$item['kode']] = $this->status($item['kode']);
        }
        return $data;
    }

    public function status($kode)
    {
        if ($this->ruang->status($kode, $this->getDayNow()) != null) {
            return 'danger';
        }
//        else if ($this->peminjaman->status($kode, "'Menunggu Konfirmasi', 'Diperlukan Surat Izin'") != null) {
//            return 'warn';
//        }
        else {
            return 'disable';
        }
    }

    private function getDayNow()
    {
        $namaHariInggris = date('l', time());

        $daftarTerjemahan = array(
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        );

        $namaHariIndonesia = $daftarTerjemahan[$namaHariInggris];

        return $namaHariIndonesia;
    }

    public function showDenah()
    {
        $this->view('user/dashboard');
    }

}