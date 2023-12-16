<?php 

namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class AdminDashboardController extends Controller {
    private Peminjaman $peminjaman;

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
        $this->peminjaman = new Peminjaman();
    }


    public function showDashboard(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/Admindashboard');
    }

    public function sum() {
        return $this->peminjaman->count();
    }
    public function top() {
        $result = array();
        foreach ($this->peminjaman->top() as $item) {
            if ($item['surat'] == null) {
                $linkSurat = 'Belum Ada Surat';
            }
            else {
                $linkSurat = '<a href="/download?file=' . urlencode($item['surat']) . '">Download Surat</a>';
            }
            $data = array($item['nama'], $item['jurusan'], $item['ruang'], $item['keterangan'], $item['tanggalPeminjaman'], $item['tanggalAcara'], $linkSurat);
            array_push($result, $data);
        }
        return $result;
    }
}