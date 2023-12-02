<?php
namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Models\AuthModel;
class AuthController {
    private AuthModel $authModel;

    public function __construct() {
        $this->authModel = new AuthModel();
    }

    public function showLoginForm(): void
    {
        include '../Views/shared/login.php';
    }

    public function processLogin(): void
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $status = $this->authModel->cekLogin($username, $password);

        if ($status) {
            header('Location: dashboard.php');
            exit();
        } else {
            $this->showLoginForm();
        }
    }
}
