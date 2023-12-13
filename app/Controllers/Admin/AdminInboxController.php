<?php 


namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;

class AdminInboxController extends Controller {

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
    }

    public function showInbox(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/inbox');
    }

}