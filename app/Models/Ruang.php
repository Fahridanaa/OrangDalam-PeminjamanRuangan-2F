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

    public function show($lantai, $bagian, $posisi) {
        $this->db->query("SELECT kode, nama, kapasitas, nomor_urut FROM ruang WHERE lantai= :lantai AND bagian = :bagian AND posisi = :posisi ORDER BY nomor_urut ASC");
        $this->db->bind(":lantai", $lantai);
        $this->db->bind(":bagian", $bagian);
        $this->db->bind(":posisi", $posisi);
        return $this->db->resultSet();
    }
}