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
        $level = $_POST['level'];

        $status = $this->authModel->cekLogin($username, $password);

        if ($status) {
            $_SESSION['level'] = $level;

            header('Location: index.php');
            exit();
        } else {
            $this->setPesan("Otentikasi gagal. Coba lagi.");

            $this->showLoginForm();
        }
    }

    private function setPesan($pesan): void
    {
        $_SESSION['pesan'] = $pesan;
    }
}
