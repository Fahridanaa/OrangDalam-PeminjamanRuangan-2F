<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class Jadwal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getJadwalByRuangDanHari($kodeRuang, $namaHari) {
       $this->db->query("SELECT jp.mulai, jp.selesai, mk.nama AS namaMK, d.nama AS namaDosen, k.nama AS namaKelas FROM jadwal INNER JOIN jp ON jp.kode = jadwal.mulai AND jadwal.selesai INNER JOIN matkul mk ON mk.kode = kode_matkul INNER JOIN dosen d ON d.nidn = nidn_dosen INNER JOIN kelas k ON k.kode = kode_kelas INNER JOIN ruang r ON r.kode = kode_ruang INNER JOIN hari h ON h.id = id_hari WHERE h.nama = :nama AND r.kode = :kode");
       $this->db->bind(":nama", $namaHari);
       $this->db->bind(":kode", $kodeRuang);
       return $this->db->resultSet();
    }
}