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
        $this->db->query("SELECT kode, nama, kapasitas FROM " . $this->table . "WHERE lantai= :lantai");
        $this->db->bind(":lantai", $lantai);
        return $this->db->resultSet();
    }
}