<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class RequestController extends Controller
{
    private Jadwal $jadwal;
    private Ruang $ruang;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->jadwal = new Jadwal();
        $this->ruang = new Ruang();
    }

    public function ShowRequestPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        
        $this->view('user/konfirmasiRuangan');
    }

}