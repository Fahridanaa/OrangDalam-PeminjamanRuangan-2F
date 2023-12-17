<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class PeminjamanController extends Controller
{
    private Peminjaman $peminjaman;

    public function __construct()
    {
        $this->peminjaman = new Peminjaman();
    }

    public function showPinjam($nim)
    {
        return $this->peminjaman->pinjam($nim);
    }

    public function showDetail($id)
    {
        return $this->peminjaman->detailPinjam($id);
    }

    public function showHistory($nim)
    {
        return $this->peminjaman->history($nim);
    }
}