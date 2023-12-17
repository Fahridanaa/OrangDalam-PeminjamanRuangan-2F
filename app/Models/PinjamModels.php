<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;
use Exception;
use PDOException;

class PinjamModels
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @throws Exception
     */
    public function detailPinjam(int $id): array
    {
        $sql = $this->getDetailPinjamQuery();
        $this->db->query($sql);
        $this->db->bind(":id", $id);

        try {
            $result = $this->db->single();

            if (!is_array($result)) {
                return [];
            }

            return $result;

        } catch (PDOException $e) {
            throw new Exception('Failed to fetch detailPinjam');
        }
    }

    /**
     * @throws Exception
     */
    public function pinjam(int $nim): array
    {
        $sql = $this->getPinjamQuery();
        $this->db->query($sql);
        $this->db->bind(":nim", $nim);

        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new Exception('Failed to fetch pinjam');
        }
    }

    private function getDetailPinjamQuery(): string
    {
        return "SELECT mahasiswa.nama AS nama, jurusan.nama AS jurusan, telepon, lantai, GROUP_CONCAT(ruang.kode) AS ruang, keterangan, tanggalAcara, tanggalPeminjaman, mulai, selesai
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
            INNER JOIN jurusan ON mahasiswa.kode_jurusan = jurusan.kode
            INNER JOIN ruang ON rp.kode_ruang = ruang.kode
            WHERE peminjaman.id = :id
            GROUP BY peminjaman.id, mahasiswa.nama, jurusan.nama, telepon, lantai, keterangan, tanggalAcara, tanggalPeminjaman, mulai, selesai";
    }

    private function getPinjamQuery(): string
    {
        return "SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(DATE_FORMAT(tanggalAcara, '%d %M %Y')) AS tanggalAcara, DATE_FORMAT(DATE_ADD(tanggalPeminjaman, INTERVAL TIMESTAMPDIFF(DAY, tanggalPeminjaman, tanggalAcara) / 2 DAY), '%d %M %Y') AS deadline
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
            WHERE status IN ('Menunggu Konfirmasi', 'Diperlukan Surat Izin', 'Telah Dikonfirmasi')  AND mahasiswa.nim = :nim
            GROUP BY id, status";
    }
}