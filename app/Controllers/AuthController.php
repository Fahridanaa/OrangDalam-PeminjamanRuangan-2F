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

    public function showDashboard(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        if ($_SESSION['level'] == 'Admin') {
            $this->view('admin/Admindashboard');
        } else {
            $this->view('user/dashboard');
        }
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
                $_SESSION['id'] = $data['id'];
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

    public function changePass() {
        $now = md5($_POST['password-sekarang'] ?? '');
        $new = md5($_POST['password-baru'] ?? '');
        $confirm = md5($_POST['konfirmasi-password-baru'] ?? '');
        $data = $this->authModel->get($_SESSION['username']);

        if ($data['password'] === $now) {
            if ($new === $confirm) {
                $this->authModel->updatePass($data['id'], $now, $new);
                header('Location: /dashboard');
            }
            else {
                echo "Konfirmasi Password Salah";
            }
        }
        else {
            $this->view('user/profile');
        }
    }

    public function logout(): void
    {
        session_destroy();
        session_start();
        header("Location: /login");
    }
}
