<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class DashboardController extends Controller
{
    private Ruang $ruang;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->ruang = new Ruang();
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
        } else {
            return 'disable';
        }
    }

    public function showDenah()
    {
        $this->view('user/dashboard');
    }

}