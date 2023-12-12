<?php 

namespace OrangDalam\PeminjamanRuangan\Middleware;


class AuthMiddleware {

    public function handleUser() {
        // Logika middleware
        if (!isset($_SESSION['level']) || ($_SESSION['level'] !== 'Mahasiswa' && $_SESSION['level'] !== 'Dosen')) {
            header("Location: /login");
            exit;
        }


    }

    public function handleAdmin() {
        // Logika middleware
        if (!isset($_SESSION['level']) || ($_SESSION['level'] !== 'Admin')) {
            header("Location: /login");
            exit;
        }
    }

}