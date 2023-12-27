<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;
use Exception;
use PDOException;

class Peminjaman
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function count()
    {
        $this->db->query("SELECT COUNT(*) AS jumlah,
       SUM(CASE WHEN status = 'Telah Dikonfirmasi' THEN 1 ELSE 0 END) AS disetujui,
       SUM(CASE WHEN status = 'Menunggu Konfirmasi' OR status = 'Diperlukan Surat Izin' THEN 1 ELSE 0 END) AS proses
       FROM peminjaman");
        return $this->db->single();
    }

    public function status($kode)
    {
        $this->db->query("SELECT peminjaman.id FROM peminjaman
        INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
        WHERE kode_ruang = :kode AND TIME(NOW()) BETWEEN mulai AND selesai AND tanggalAcara = DATE(NOW()) AND status IN('Menunggu Konfirmasi', 'Diperlukan Surat Izin')");
        $this->db->bind(":kode", $kode);
        return $this->db->single();
    }

    public function use($kode)
    {
        $this->db->query("SELECT peminjaman.id FROM peminjaman
        INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
        WHERE kode_ruang = :kode AND TIME(NOW()) BETWEEN mulai AND selesai AND tanggalAcara = DATE(NOW()) AND status IN('Telah Dikonfirmasi')");
        $this->db->bind(":kode", $kode);
        return $this->db->single();
    }

    public function statusAcara($data)
    {
        $this->db->query("SELECT peminjaman.id, status FROM peminjaman
        INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
        WHERE kode_ruang = :ruang AND :mulai BETWEEN mulai AND selesai AND tanggalAcara = :tanggal AND status IN('Menunggu Konfirmasi', 'Diperlukan Surat Izin', 'Telah Dikonfirmasi')");
        $this->db->bind(":ruang", $data['ruang']);
        $this->db->bind(":mulai", $data['mulai']);
        $this->db->bind(":tanggal", $data['tanggal']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function top()
    {
        $this->db->query("SELECT peminjaman.id,
        mahasiswa.nama AS nama,
        jurusan.nama AS jurusan,
        GROUP_CONCAT(ruang.kode) AS ruang,
        keterangan,
        DATE_FORMAT(tanggalPeminjaman, '%d %M %Y') AS tanggalPeminjaman,
        DATE_FORMAT(tanggalAcara, '%d %M %Y') AS tanggalAcara,
        surat
        FROM peminjaman
        INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
        INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
        INNER JOIN jurusan ON mahasiswa.kode_jurusan = jurusan.kode
        INNER JOIN ruang ON rp.kode_ruang = ruang.kode
        WHERE status IN ('Menunggu Konfirmasi', 'Diperlukan Surat Izin', 'Telah Dikonfirmasi')
        GROUP BY peminjaman.id DESC
        LIMIT 5");
        return $this->db->resultSet();
    }

    public function konfirmasi()
    {
        $this->db->query("SELECT peminjaman.id AS id, 
       mahasiswa.nama AS nama,
       GROUP_CONCAT(ruang.kode) AS ruang,
       DATE_FORMAT(tanggalAcara, '%d %M %Y') AS tanggalAcara,
       mahasiswa.telepon AS telepon,
       tanda_pengenal,
       surat, nim_mhs, nidn_dosen
       FROM peminjaman
       INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
       INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
       INNER JOIN ruang ON rp.kode_ruang = ruang.kode
       WHERE status IN ('Menunggu Konfirmasi', 'Diperlukan Surat Izin', 'Telah Dikonfirmasi')
       GROUP BY peminjaman.id DESC");
        return $this->db->resultSet();
    }

    public function statusKonfirmasi($id)
    {
        $this->db->query("SELECT status FROM peminjaman WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function historiMahasiswa()
    {
        $this->db->query("SELECT peminjaman.id,
        mahasiswa.nama AS nama,
        jurusan.nama AS jurusan,
        GROUP_CONCAT(ruang.kode) AS ruang,
        keterangan,
        DATE_FORMAT(tanggalPeminjaman, '%d %M %Y') AS tanggalPeminjaman,
        DATE_FORMAT(tanggalAcara, '%d %M %Y') AS tanggalAcara,
        surat
        FROM peminjaman
        INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
        INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
        INNER JOIN jurusan ON mahasiswa.kode_jurusan = jurusan.kode
        INNER JOIN ruang ON rp.kode_ruang = ruang.kode
        WHERE status IN ('Peminjaman Berhasil', 'Peminjaman Gagal')
        GROUP BY peminjaman.id DESC");
        return $this->db->resultSet();
    }

    public function historiDosen()
    {
        $this->db->query("SELECT peminjaman.id,
       dosen.nama AS nama,
       GROUP_CONCAT(ruang.kode) AS ruang,
       keterangan,
       DATE_FORMAT(tanggalPeminjaman, '%d %M %Y') AS tanggalPeminjaman,
       DATE_FORMAT(tanggalAcara, '%d %M %Y') AS tanggalAcara,
       surat
       FROM peminjaman
       INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
       INNER JOIN dosen ON peminjaman.nidn_dosen = dosen.nidn
       INNER JOIN ruang ON rp.kode_ruang = ruang.kode
       WHERE status IN ('Peminjaman Berhasil', 'Peminjaman Gagal')
       GROUP BY peminjaman.id DESC");
        return $this->db->resultSet();
    }

    public function updateStatus($status, $id)
    {
        $this->db->query("UPDATE peminjaman SET status = :status WHERE id = :id");
        $this->db->bind(":status", $status);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    private function getRequestDsn() : string
    {
        return "SELECT id, meminta, menerima, status, matkul.nama AS matkul, ruang.nama AS ruang FROM request
                INNER JOIN jadwal ON jadwal.kode = request.jadwal_kelas
                INNER JOIN matkul ON jadwal.kode_matkul = matkul.kode
                INNER JOIN ruang ON request.ruang = ruang.kode WHERE meminta = :nomor OR menerima = :nomor";
    }

    private function getRequestDetails() : string
    {
        return "SELECT 
                ruang.lantai AS lantai, 
                dosen.nama AS dosen, 
                mahasiswa.nama AS ketua_kelas,
                kelas.nama AS kelas, 
                ruang.nama AS ruang, 
                request.keterangan AS keterangan, 
                request.tanggal AS tanggal, 
                matkul.nama AS matkul, 
                jp.mulai AS mulai, 
                jp.selesai AS selesai
            FROM request
            INNER JOIN jadwal ON request.jadwal_kelas = jadwal.kode
            INNER JOIN ruang ON request.ruang = ruang.kode
            INNER JOIN jp ON request.mulai = jp.kode
            INNER JOIN jp ON request.selesai = jp.kode
            INNER JOIN dosen ON jadwal.nidn_dosen = dosen.nidn
            INNER JOIN mahasiswa ON jadwal.kode_kelas = mahasiswa.kode_kelas AND mahasiswa.ketua_kelas IS NULL
            INNER JOIN kelas ON jadwal.kode_kelas = kelas.kode
            INNER JOIN matkul ON jadwal.kode_matkul = matkul.kode
            WHERE request.id = :id";
    }

    public function detailMatkul($id) : array
    {
        $sql = $this->getRequestDetails();
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        return $this->db->resultSet();
    }

    public function request($nomor) : array
    {
        $sql = $this->getRequestDsn();
        $this->db->query($sql);
        $this->db->bind(":nomor", $nomor);
        return $this->db->resultSet();
    }

    public function updateRequest($status, $id)
    {
        $this->db->query("UPDATE `request` SET `status` = :status WHERE `request`.`id` = :id");
        $this->db->bind(":status", $status);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}