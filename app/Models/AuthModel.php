<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class AuthModel
{
    private $table = "user";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($username)
    {
        $this->db->query("SELECT id, username, password, level FROM " . $this->table . " WHERE username = :user");
        $this->db->bind(":user", $username);
        return $this->db->single();
    }

    public function getProfileMhs($id) {
        $this->db->query("SELECT mahasiswa.nama AS nama, nim, jurusan.nama AS jurusan, prodi.nama AS prodi, telepon, mahasiswa.kode_kelas AS kelas, mahasiswa.ketua AS ketua, profile
            FROM user
            INNER JOIN mahasiswa ON user.nim_mhs = mahasiswa.nim
            INNER JOIN jurusan ON mahasiswa.kode_jurusan = jurusan.kode
            INNER JOIN prodi ON mahasiswa.kode_prodi = prodi.kode
            WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function getProfileDsn($id)
    {
        $this->db->query("SELECT nama, nidn, telepon, profile FROM user
        INNER JOIN dosen ON user.nip_dosen = dosen.nidn
        WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function updatePass($id, $old, $new) {
        $this->db->query("UPDATE user SET password= :new WHERE password= :old AND id= :id");
        $this->db->bind(":old", $old);
        $this->db->bind(":new", $new);
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
}