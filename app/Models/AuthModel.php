<?php
namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class AuthModel {
    private $table = "user";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($username) {
        $this->db->query("SELECT id, username, password, level FROM " . $this->table . " WHERE username = :user");
        $this->db->bind(":user", $username);
        return $this->db->single();
    }

    public function getProfile($nim) {
        $this->db->query("SELECT mahasiswa.nama, nim, jurusan.nama, prodi.nama, telepon
            FROM user
            INNER JOIN mahasiswa ON user.nim_mhs = mahasiswa.nim
            INNER JOIN jurusan ON mahasiswa.kode_jurusan = jurusan.kode
            INNER JOIN prodi ON mahasiswa.kode_prodi = prodi.kode
            WHERE nim = :nim");
        $this->db->bind(":nim", $nim);
        return $this->db->single();
    }

    public function updatePass($old, $new) {
        $this->db->query("UPDATE user SET password= :new WHERE password= :old");
        $this->db->bind(":old", $old);
        $this->db->bind(":new", $new);
        return $this->db->rowCount();
    }
}