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

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->jadwal = new Jadwal();
        $this->fasilitas = new Fasilitas();
        $this->jadwalAcara = new JadwalAcara();
    }

    public function showDetailRuangan(): void
    {

        $kode = $_GET['kode'];
        if (!isset($kode)) {
            header('Location: /dashboard');
            exit;
        }

        $this->ensureUserIsLoggedIn();
      
        // Mengambil data fasilitas dari model berdasarkan kode ruangan
        $fasilitasData = $this->fasilitas->getFasilitasByRuang($kode);
        $jadwalAcaraData = $this->jadwalAcara->getJadwalAcaraByRuangDanHari($kode);
      
        // Mengirim data ke view
        $this->view('user/detailRuangan', [
            'fasilitas' => $fasilitasData, 
            'kodeRuang' => $kode,
            'jadwalAcara' => $jadwalAcaraData
        ]);
    }
  
    public function getJadwal($ruang, $hari)
    {
        return $this->jadwal->getJadwalByRuangDanHari($ruang, $hari);
    }
}