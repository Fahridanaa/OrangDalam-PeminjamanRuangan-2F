<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;
use Exception;
use PDOException;

class PinjamModel
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

    public function uploadSurat(string $fileSurat, int $id)
    {
        $this->db->query("UPDATE peminjaman SET surat = :surat, status = :status WHERE id = :id AND surat IS NULL AND status = 'Diperlukan Surat Izin'");
        $this->db->bind(":id", $id);
        $this->db->bind(":surat", $fileSurat);
        $this->db->bind(":status", 'Menunggu Konfirmasi');
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public function pinjam(int $nomor): array
    {
        if ($_SESSION['level'] == 'Mahasiswa') {
            $sql = $this->getPinjamMhs();
            $bind = ":nim";
        }
        else {
            $sql = $this->getPinjamDsn();
            $bind = ":nidn";
        }
        $this->db->query($sql);
        $this->db->bind($bind, $nomor);

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

    private function getPinjamMhs(): string
    {
        return "SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(DATE_FORMAT(tanggalAcara, '%d %M %Y')) AS tanggalAcara, DATE_FORMAT(DATE_ADD(tanggalPeminjaman, INTERVAL TIMESTAMPDIFF(DAY, tanggalPeminjaman, tanggalAcara) / 2 DAY), '%d %M %Y') AS deadline
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
            WHERE status IN ('Menunggu Konfirmasi', 'Diperlukan Surat Izin', 'Telah Dikonfirmasi')  AND mahasiswa.nim = :nim
            GROUP BY id, status";
    }
    private function getPinjamDsn() : string
    {
        return "SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(DATE_FORMAT(tanggalAcara, '%d %M %Y')) AS tanggalAcara, DATE_FORMAT(DATE_ADD(tanggalPeminjaman, INTERVAL TIMESTAMPDIFF(DAY, tanggalPeminjaman, tanggalAcara) / 2 DAY), '%d %M %Y') AS deadline
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN dosen ON peminjaman.nidn_dosen = dosen.nidn
            WHERE status IN ('Menunggu Konfirmasi', 'Diperlukan Surat Izin', 'Telah Dikonfirmasi') AND dosen.nidn = :nidn
            GROUP BY id, status";
    }
}