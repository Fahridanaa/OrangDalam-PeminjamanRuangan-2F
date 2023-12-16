<?php


namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Notifikasi;

class AdminInboxController extends Controller
{
    private Notifikasi $notifikasi;
    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
        $this->notifikasi = new Notifikasi();
    }

    public function showInbox(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }
        $data['notif'] = $this->notifikasi->getNotifAdmin();
        $this->view('admin/inbox', $data);
    }
}
