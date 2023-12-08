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
        $data = $this->authModel->get($username);
        session_start();

        if ($data == NULL) {
            $this->showLoginForm();
        }
        else {
            if ($data['password'] === md5($password)) {
                $_SESSION['username'] = $data['username'];
                $_SESSION['level'] = $data['level'];
                if ($data['level'] === "Mahasiswa") {
                    header('Location: /dashboard');
                }
                else if ($data['level'] === "Admin") {
                    header('Location: /dashboard');
                }
                else {
                    $this->showLoginForm();
                }
            }
            else {
                $this->showLoginForm();
            }
        }
    }

    public function logout(): void
    {
        session_destroy();
        session_start();
        header("Location: /login");
    }

}
