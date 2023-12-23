<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

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

    public function history($nim)
    {
        $this->db->query("SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(DATE_FORMAT(tanggalAcara, '%d %M %Y')) AS tanggalAcara
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
            WHERE status IN ('Peminjaman Berhasil', 'Peminjaman Gagal')  AND mahasiswa.nim = :nim
            GROUP BY id, status");
        $this->db->bind(":nim", $nim);
        return $this->db->resultSet();
    }

    public function status($kode)
    {
        $this->db->query("SELECT peminjaman.id FROM peminjaman
        INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
        WHERE kode_ruang = :kode AND TIME(NOW()) BETWEEN mulai AND selesai AND tanggalAcara = DATE(NOW()) AND status IN('Menunggu Konfirmasi', 'Diperlukan Surat Izin')");
        $this->db->bind(":kode", $kode);
        return $this->db->single();
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

    public function updateStatus($status, $id) {
        $this->db->query("UPDATE peminjaman SET status = :status WHERE id = :id");
        $this->db->bind(":status", $status);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}