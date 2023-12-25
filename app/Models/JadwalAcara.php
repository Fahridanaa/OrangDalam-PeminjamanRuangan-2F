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

    public function getJadwalAcaraByRuangDanHari($kodeRuang) {
        $this->db->query("SELECT p.tanggalAcara, p.mulai, p.selesai, p.keterangan, COALESCE(m.nama, d.nama) AS nama
                          FROM peminjaman p
                          INNER JOIN rp ON rp.id_peminjaman = p.id
                          LEFT JOIN mahasiswa m ON m.nim = p.nim_mhs
                          LEFT JOIN dosen d ON d.nidn = p.nidn_dosen
                          INNER JOIN ruang r ON r.kode = rp.kode_ruang
                          WHERE r.kode = :kodeRuang AND p.status = 'Telah Dikonfirmasi'");
        $this->db->bind(":kodeRuang", $kodeRuang);
        return $this->db->resultSet();
    }
}