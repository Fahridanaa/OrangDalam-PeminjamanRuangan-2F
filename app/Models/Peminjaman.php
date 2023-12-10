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

    public function insert($data) {
        $this->db->query("INSERT INTO peminjaman(tanggalPeminjaman,tanggalAcara, mulai, selesai, urgent, keterangan, status, nim_mhs, nidn_dosen, tanda_pengenal)
        VALUES (TIME(NOW()), :tanggalEvent, :mulai, :selesai, :urgent, :keterangan, :status ,:nim, :nidn, :tandaPengenal)");
        $this->db->bind(":tanggalEvent", $data['event']); // DATETIME
        $this->db->bind(":mulai", $data['mulai']); // TIME
        $this->db->bind(":selesai", $data['selesai']); // TIME
        $this->db->bind(":urgent", $data['urgent']); // BOOL
        $this->db->bind(":keterangan", $data['keterangan']); // VARCHAR
        $this->db->bind(":status", $data['status']); // ENUM
        $this->db->bind(":nim", $data['nim']);
        $this->db->bind(":nidn", $data['nidn']);
        $this->db->bind(":tandaPengenal", $data['pengenal']);
    }

    public function pinjam($data) {
        $this->db->query("SELECT id, GROUP_CONCAT(kode_ruang) AS kode_ruang, status, MIN(tanggalAcara) AS tanggalAcara
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            WHERE status IN (:data)
            GROUP BY id, status;");
        $this->db->bind(":data", $data);
        return $this->db->resultSet();
    }

    public function detailPinjamMahasiswa($id) {
        $this->db->query("SELECT mahasiswa.nama AS nama, jurusan.nama AS jurusan, telepon, lantai, GROUP_CONCAT(ruang.kode) AS ruang, keterangan, tanggalAcara, tanggalPeminjaman, mulai, selesai
            FROM peminjaman
            INNER JOIN rp ON peminjaman.id = rp.id_peminjaman
            INNER JOIN mahasiswa ON peminjaman.nim_mhs = mahasiswa.nim
            INNER JOIN jurusan ON mahasiswa.kode_jurusan = jurusan.kode
            INNER JOIN ruang ON rp.kode_ruang = ruang.kode
            WHERE peminjaman.id = :id
            GROUP BY peminjaman.id, mahasiswa.nama, jurusan.nama, telepon, lantai, keterangan, tanggalAcara, tanggalPeminjaman, mulai, selesai;");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
}