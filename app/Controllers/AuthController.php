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
        $this->ensureUserIsLoggedIn();
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
        if ($data == NULL) {
            $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'username atau password salah', 'color' => 'danger'];
            $this->showLoginForm();
        } else {
            if ($data['password'] === md5($password)) {
                $_SESSION['level'] = $data['level'];
                if ($_SESSION['level'] == 'Mahasiswa') {
                    $_SESSION['user'] = $this->authModel->getProfileMhs($data['id']);
                }
                elseif ($_SESSION['level'] == 'Dosen') {
                    $_SESSION['user'] = $this->authModel->getProfileDsn($data['id']);
                } else {
                    $_SESSION['user'] = $this->authModel->getProfileAdmin($data['id']);
                }
                header('Location: /dashboard');

            } else {
                $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'username atau password salah', 'color' => 'danger'];
                $this->showLoginForm();
            }
        }
    }

    public function changePass()
    {
        $now = md5($_POST['password-sekarang'] ?? '');
        $new = md5($_POST['password-baru'] ?? '');
        $confirm = md5($_POST['konfirmasi-password-baru'] ?? '');
        $data = $this->authModel->get($_SESSION['user']['nim']);

        if ($data['password'] === $now) {
            if ($new === $confirm) {
                $this->authModel->updatePass($data['id'], $now, $new);
                $_SESSION['flash_message'] = ['type' => 'success', 'message' => 'Password berhasil dirubah', 'color' => 'select'];
            } else {
                $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Konfirmasi Password Salah', 'color' => 'warn'];
            }
        } else {
            $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Password Salah', 'color' => 'danger'];
        }
        $this->view('user/profile');
    }

    public function logout(): void
    {
        session_destroy();
        session_start();
        header("Location: /login");
    }
}
