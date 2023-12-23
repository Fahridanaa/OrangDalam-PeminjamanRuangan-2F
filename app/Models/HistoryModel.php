<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;
use Exception;
use PDOException;

class HistoryModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @throws Exception
     */
    public function history($nim)
    {
        $sql = $this->getHistoryQuery();
        $this->db->query($sql);
        $this->db->bind(":nim", $nim);
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new Exception('Failed to fetch history');
        }
    }

    private function getHistoryQuery(): string
    {
        return "SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(DATE_FORMAT(tanggalAcara, '%d %M %Y')) AS tanggalAcara
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
            WHERE status IN ('Peminjaman Berhasil', 'Peminjaman Gagal')  AND mahasiswa.nim = :nim
            GROUP BY id, status";
    }
}