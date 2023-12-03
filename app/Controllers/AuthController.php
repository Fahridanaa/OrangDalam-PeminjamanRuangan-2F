<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\AuthModel;

class AuthController extends Controller
{
    private AuthModel $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();

    }

    public function showLoginForm(): void
    {
        $this->view('shared/login');
    }

    public function processLogin(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $status = $this->authModel->cekLogin($username, $password);


        if ($status) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';

            header('Location: /dashboard');

            exit();
        } else {
            $this->showLoginForm();
        }

    }

    public function logout(): void
    {
        session_destroy();
        session_start();
        header("Location: /login");
    }

}
