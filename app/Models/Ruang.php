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

    public function status($kode, $hari) {
        $this->db->query("SELECT jadwal.kode FROM ruang
        INNER JOIN jadwal ON ruang.kode = jadwal.kode_ruang
        INNER JOIN jp mulai ON jadwal.mulai = mulai.kode
        INNER JOIN jp selesai ON jadwal.selesai = selesai.kode
        INNER JOIN hari ON jadwal.id_hari = hari.id
        WHERE ruang.kode = :kode AND hari.nama = :hari AND TIME(NOW()) BETWEEN mulai.mulai AND selesai.selesai");
        $this->db->bind(":kode", $kode);
        $this->db->bind(":hari",$hari);
        return $this->db->single();
    }

    public function print() {

    }
}