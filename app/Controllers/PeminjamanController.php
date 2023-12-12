<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class PeminjamanController extends Controller
{
    private Peminjaman $peminjaman;

    public function __construct()
    {
        $this->peminjaman = new Peminjaman();
    }

    public function showPinjam() {
        return $this->peminjaman->pinjam();
    }

    public function showHistory() {
        return $this->peminjaman->history();
    }

    public function insertAcara() {
        $tanggalAcara = $_POST['acara-tanggal'];
        $mulai = $_POST['acara-jam-mulai'];
        $selesai = $_POST['acara-jam-selesai'];
        $urgent = $_POST['acara-urgent'];
        $keterangan = $_POST['acara-keterangan'];

        $data = [];
        $this->peminjaman->insert($data);
    }
}