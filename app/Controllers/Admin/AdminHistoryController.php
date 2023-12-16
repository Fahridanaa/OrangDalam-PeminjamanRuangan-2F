<?php 


namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class AdminHistoryController extends Controller {

    private Peminjaman $peminjaman;

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
        $this->peminjaman = new Peminjaman();
    }

    public function showHistory(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        } 
        

        $this->view('admin/history');
    }

    public function historyMahasiswa() {
        $result = array();
        foreach ($this->peminjaman->historiMahasiswa() as $item) {
            if ($item['surat'] == null) {
                $linkSurat = '-';
            }
            else {
                $linkSurat = '<a href="/download?file=' . urlencode($item['surat']) . '">Download Surat</a>';
            }
            $data = array($item['nama'], $item['jurusan'], $item['ruang'], $item['keterangan'], $item['tanggalPeminjaman'], $item['tanggalAcara'], $linkSurat);
            array_push($result, $data);
        }
        return $result;
    }

    public function historyDosen() {
        $result = array();
        foreach ($this->peminjaman->historiDosen() as $item) {
            if ($item['surat'] == null) {
                $linkSurat = '-';
            }
            else {
                $linkSurat = '<a href="/download?file=' . urlencode($item['surat']) . '">Download Surat</a>';
            }
            $data = array($item['nama'], 'Teknologi Informasi', $item['ruang'], $item['keterangan'], $item['tanggalPeminjaman'], $item['tanggalAcara'], $linkSurat);
            array_push($result, $data);
        }
        return $result;
    }
}