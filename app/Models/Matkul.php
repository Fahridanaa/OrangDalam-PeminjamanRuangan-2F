<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class Matkul
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function read()
    {
        $this->db->query("SELECT kode, nama FROM matkul GROUP BY nama ASC");
        return $this->db->resultSet();
    }

    public function matkulByKode($kode)
    {
        $this->db->query("SELECT nama FROM matkul WHERE kode = :kode");
        $this->db->bind(":kode", $kode);
        return $this->db->single();
    }
}