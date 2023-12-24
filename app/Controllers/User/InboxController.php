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
        $data['notifikasi'] = $this->notifikasi->getNotif($_SESSION['user']['nim']);
        $this->view('user/inbox', $data);
    }

}