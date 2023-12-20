<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class JadwalAcara
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getJadwalAcaraByRuangDanHari($kodeRuang, $namaHari) {
        $this->db->query("SELECT p.mulai, p.selesai, p.keterangan AS keteranganAcara, m.nama AS penanggungJawab
                          FROM peminjaman p
                          INNER JOIN rp ON rp.id_peminjaman = p.id
                          INNER JOIN mahasiswa m ON m.nim = p.nim_mhs
                          INNER JOIN ruang r ON r.kode = rp.kode_ruang
                          WHERE DAYOFWEEK(p.tanggalPinjam) = DAYOFWEEK(:tanggalPinjam) AND r.kode = :kodeRuang");
        $this->db->bind(":tanggalPinjam", $namaHari);
        $this->db->bind(":kodeRuang", $kodeRuang);
    
        return $this->db->resultSet();
    }
    
}