<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jurusan;

class JurusanController extends Controller
{
    private Jurusan $jurusan;

    public function __construct()
    {
        $this->jurusan = new Jurusan();
    }

    public function showJurusan() : void {
        $this->view('shared/JurusanView');
    }


}