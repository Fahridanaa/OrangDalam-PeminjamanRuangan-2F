<?php
namespace OrangDalam\PeminjamanRuangan\Models;

class AuthModel {
    public function cekLogin($username, $password): bool
    {
        return $this->verifikasiKredensial($username, $password);
    }

    private function verifikasiKredensial($username, $password): bool
    {
        $dataPengguna = [
            'username' => 'user',
            'password' => 'user',
            'role' => 'user'
        ];

        return ($username === $dataPengguna['username'] && $password === $dataPengguna['password']);
    }
}