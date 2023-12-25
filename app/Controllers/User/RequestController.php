<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\DosenPengampu;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Matkul;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class RequestController extends Controller
{
    private DosenPengampu $dosenPengampu;
    private Matkul $matkul;
    private Jadwal $jadwal;
    private Ruang  $ruang;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->dosenPengampu = new DosenPengampu();
        $this->matkul = new Matkul();
        $this->jadwal = new Jadwal();
        $this->ruang = new Ruang();
    }

    public function ShowRequestPage(): void
    {
        $this->ensureUserIsLoggedIn();
        $this->view('user/konfirmasiRuangan');
    }

    public function getDosen()
    {
        return $this->dosenPengampu->dosen();
    }
    public function getMatkul()
    {
        return $this->matkul->read();
    }

    public function getjp()
    {
        return $this->dosenPengampu->jp();
    }

    public function getJPByKode($kode)
    {
        return $this->jadwal->getJPByKode($kode);
    }

    public function getDosenByNidn($nidn)
    {
        return $this->dosenPengampu->dosenByNidn($nidn);
    }

    public function getMatkulByKode($kode)
    {
        return $this->matkul->matkulByKode($kode);
    }

    public function getDay($date)
    {
        return $this->getDayNow($date);
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
        if ($this->ruang->status($kode, $this->getDayNow(strtotime($_SESSION['formPinjam']['tanggal-matkul']))) != null) {
            return 'locked';
        }
        else {
            return 'disable';
        }
    }
}