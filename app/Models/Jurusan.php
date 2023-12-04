<?php

namespace OrangDalam\PeminjamanRuangan\Models;

class Jurusan
{
    private $table = 'jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new \Database();
    }

    public function getJurusan() {
        $this->db->query('SELECT * FROM' . $this->table);
        return $this->db->resultSet();
    }
}