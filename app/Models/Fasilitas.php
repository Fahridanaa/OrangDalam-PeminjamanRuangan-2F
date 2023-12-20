<?php 
namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class Fasilitas{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getFasilitasByRuang($kode) {
        $this->db->query("SELECT ruang.kode, ruang.nama, ruang.kapasitas, fasilitas.nama, fasilitas.jumlah
                          FROM ruang
                          LEFT JOIN fasilitas ON ruang.kode = fasilitas.kode_ruang
                          WHERE ruang.kode = :kodeRuang");
        $this->db->bind(":kodeRuang", $kode);
        return $this->db->resultSet();
    }
}
?>