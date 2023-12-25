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
    private Fasilitas $fasilitas;
    private JadwalAcara $jadwalAcara;
    private Ruang $ruang;
    private Peminjaman $peminjaman;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->jadwal = new Jadwal();
        $this->fasilitas = new Fasilitas();
        $this->jadwalAcara = new JadwalAcara();
        $this->ruang = new Ruang();
        $this->peminjaman = new Peminjaman();
    }

    public function showDetailRuangan(): void
    {
        $kode = $_GET['kode'];
        if (!isset($kode)) {
            header('Location: /dashboard');
            exit;
        }

        $this->ensureUserIsLoggedIn();
        $fasilitasData = $this->fasilitas->getFasilitasByRuang($kode);
        $jadwalAcaraData = $this->jadwalAcara->getJadwalAcaraByRuangDanHari($kode);

        $this->view('user/detailRuangan', [
            'fasilitas' => $fasilitasData,
            'jadwalAcara' => $jadwalAcaraData
        ]);
    }

    public function getJadwal()
    {
        $ruang = $_GET['kode'];
        $date = $_POST['tanggalPilih'] ?? date('Y-m-d');
        $formattedDate = strtotime($date);
        return $this->jadwal->getJadwalByRuangDanHari($ruang, $this->getDayNow($formattedDate));
    }

    public function status()
    {
        $kode = $_GET['kode'];
        $status = ['Digunakan', 'Dibooking', 'Kosong'];

        if ($this->ruang->status($kode, $this->getDayNow(time())) != null) {
            $background = 'danger';
            $statusNow = $status[0];
        } elseif ($this->peminjaman->status($kode) != null) {
            $background = 'warn';
            $statusNow = $status[1];
        } else {
            $background = 'disable';
            $statusNow = $status[2];
        }
        return "<span class='text-neutral-color px-3 py-1 bg-{$background}-color rounded-md self-start'>{$statusNow}</span>";
    }
}