<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class Ruang
{
    private $table = 'ruang';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function show($lantai) {
        $this->db->query("SELECT kode, nama, kapasitas, nomor_urut FROM ruang WHERE lantai= :lantai ORDER BY nomor_urut ASC");
        $this->db->bind(":lantai", $lantai);
        return $this->db->resultSet();
    }
}