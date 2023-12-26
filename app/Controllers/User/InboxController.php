<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Notifikasi;


class InboxController extends Controller
{

    private $notifikasi;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->notifikasi = new Notifikasi();
    }

    public function showInboxPage(): void
    {
        $this->ensureUserIsLoggedIn();
        $data = [];
        if ($_SESSION['level'] == 'Mahasiswa') {
            $data['notifikasi'] = $this->notifikasi->getNotif($_SESSION['user']['nim']);
        }
        elseif ($_SESSION['level'] == 'Dosen') {
            $data['notifikasi'] = $this->notifikasi->getNotif($_SESSION['user']['nidn']);
        }
        $this->view('user/inbox', $data);
    }

}