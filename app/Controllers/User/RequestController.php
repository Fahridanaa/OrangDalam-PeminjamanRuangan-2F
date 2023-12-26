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
    private Ruang $ruang;

    private Peminjaman $peminjaman;

    private Peminjaman $peminjaman;

    private Peminjaman $peminjaman;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->dosenPengampu = new DosenPengampu();
        $this->matkul = new Matkul();
        $this->jadwal = new Jadwal();
        $this->ruang = new Ruang();
        $this->peminjaman = new Peminjaman();
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
        $result = 0;
        $data = [];
        $waktuMulai = '07:00';
        $waktuSelesai = '17:10';
        if ($_SESSION['formPinjam']['category'] == 'acara') {
            $time = $_SESSION['formPinjam']['acara-tanggal'];
            $mulai = $_SESSION['formPinjam']['acara-jam-mulai'];
            $selesai = $_SESSION['formPinjam']['acara-jam-selesai'];
            $tanggal = $_SESSION['formPinjam']['acara-tanggal'];
            $dayNumber = date('N', strtotime($time));
            $data['ruang'] = $kode;
            $data['mulai'] = $mulai;
            $data['tanggal'] = $tanggal;
            if ($dayNumber > 1 && $dayNumber < 6) {
                if ($mulai >= $waktuMulai || $selesai <= $waktuSelesai) {
                    $result = 1;
                }
                else {
                    $result = $this->peminjaman->statusAcara($data);
                }
            }
            else {
                $result = $this->peminjaman->statusAcara($data);
            }
        }
        elseif ($_SESSION['formPinjam']['category'] == 'matkul') {
            $time = $_SESSION['formPinjam']['tanggal-matkul'];
            $data['hari'] = $this->getDayNow(strtotime($time));
            $data['ruang'] = $kode;
            $data['mulai'] = (int)$_SESSION['formPinjam']['jam-selesai-matkul'];
            $data['selesai'] = (int)$_SESSION['formPinjam']['jam-mulai-matkul'];
            $result = $this->ruang->statusSelectRuang($data);
        }

        $bg = '';

        if ($result > 0) {
            $bg =  'locked';
        }
        else {
            /*if (isset($_SESSION['formPinjam']['ruangan'][$kode])) {
                $bg = 'select';
            }
            else {
                $bg = 'disable';
            }*/
            $bg = 'disable';
        }
        return $bg;
    }
}