<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;


use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class ProfileController extends Controller
{
    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
    }


    public function showProfile(): void
    {
        $this->ensureUserIsLoggedIn();
        $this->view('user/profile');
    }

}