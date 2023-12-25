<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class DashboardController extends Controller
{
    private Ruang $ruang;
    private Peminjaman $peminjaman;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->ruang = new Ruang();
        $this->peminjaman = new Peminjaman();
    }

    public function denah($lantai, $bagian, $posisi)
    {
        $data = array();
        foreach ($this->ruang->show($lantai, $bagian, $posisi) as $item) {
            $data[$item['kode']] = $this->status($item['kode']);
        }
        return $data;
    }

    public function status($kode): string
    {
        if ($this->ruang->status($kode, $this->getDayNow(time())) != null) {
            return 'danger';
        } elseif ($this->peminjaman->status($kode) != null) {
            return 'warn';
        } else {
            return 'disable';
        }
    }

    public function showDenah()
    {
        $this->view('user/dashboard');
    }

}