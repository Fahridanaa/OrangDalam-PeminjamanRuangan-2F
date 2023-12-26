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