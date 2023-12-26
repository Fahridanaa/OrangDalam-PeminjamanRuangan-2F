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
    public function history($nomor)
    {
        if ($_SESSION['level'] == 'Mahasiswa') {
            $sql = $this->getHistoryMhs();
            $bind = ":nim";
        }
        else {
            $sql = $this->getHistoryDsn();
            $bind = ":nidn";
        }
        $this->db->query($sql);
        $this->db->bind($bind, $nomor);
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new Exception('Failed to fetch history');
        }
    }

    private function getHistoryMhs(): string
    {
        return "SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(DATE_FORMAT(tanggalAcara, '%d %M %Y')) AS tanggalAcara
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
            WHERE status IN ('Peminjaman Berhasil', 'Peminjaman Gagal')  AND mahasiswa.nim = :nim
            GROUP BY id, status";
    }

    private function getHistoryDsn() : string
    {
        return "SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(DATE_FORMAT(tanggalAcara, '%d %M %Y')) AS tanggalAcara
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN dosen ON peminjaman.nidn_dosen = dosen.nidn
            WHERE status IN ('Peminjaman Berhasil', 'Peminjaman Gagal') AND dosen.nidn = :nidn
            GROUP BY id, status";
    }
}