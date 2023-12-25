<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class DosenPengampu
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function read($matkul)
    {
        $this->db->query("SELECT nidn, dosen.nama AS dosen FROM dosenpengampu
        INNER JOIN matkul ON dosenpengampu.kode_matkul = matkul.kode
        INNER JOIN dosen ON dosenpengampu.nidn_dosen = dosen.nidn
        WHERE matkul.kode = :matkul
        ORDER BY dosen.nama ASC");
        $this->db->bind(":matkul", $matkul);
        return $this->db->resultSet();
    }

    public function dosen()
    {
        $this->db->query('SELECT nidn, nama FROM dosen GROUP BY nama ASC');
        return $this->db->resultSet();
    }

    public function dosenByNidn($nidn)
    {
        $this->db->query("SELECT nama FROM dosen WHERE nidn = :nidn");
        $this->db->bind(":nidn", $nidn);
        return $this->db->single();
    }

    public function jp()
    {
        $this->db->query("SELECT kode FROM jp");
        return $this->db->resultSet();
    }
}