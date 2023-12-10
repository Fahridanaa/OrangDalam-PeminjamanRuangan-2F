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

    public function insertAcara() {

    }
}