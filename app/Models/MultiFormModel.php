<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class MultiFormModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert($data, $room_ids)
    {
        $this->db->query("INSERT INTO peminjaman(tanggalPeminjaman, tanggalAcara, mulai, selesai, urgent, keterangan, status, nim_mhs, nidn_dosen, tanda_pengenal)
        VALUES (DATE(NOW()), :tanggalEvent, :mulai, :selesai, :urgent, :keterangan, :status ,:nim, :nidn, :tandaPengenal)");
        $this->db->bind('tanggalEvent', $data['event']); // DATETIME
        $this->db->bind('mulai', $data['mulai']); // TIME
        $this->db->bind('selesai', $data['selesai']); // TIME
        $this->db->bind('urgent', $data['urgent']); // BOOL
        $this->db->bind('keterangan', $data['keterangan']); // VARCHAR
        $this->db->bind('status', $data['status']); // ENUM
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nidn', $data['nidn']);
        $this->db->bind('tandaPengenal', $data['pengenal']);
        $this->db->execute();
        $peminjaman_id = $this->db->lastInsertId();

        foreach ($room_ids as $room_id) {
            $this->db->query("INSERT INTO rp(id_peminjaman, kode_ruang) VALUES (:peminjaman_id, :room_id)");
            $this->db->bind('peminjaman_id', $peminjaman_id);
            $this->db->bind('room_id', $room_id);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function addRequest($data)
    {
        $this->db->query("INSERT INTO request(nim, ruang, keterangan, status, tanda_pengenal, mulai, selesai, tanggal, jadwal_kelas, mulai_lama, selesai_lama, hari_lama, ruang_lama)
        VALUES (:nim, :ruang, :keterangan, :status, :pengenal, :mulai, :selesai, :tanggal, :jadwal, :mulai_lama, :selesai_lama, :hari_lama, :ruang_lama)");
        $this->db->bind(":nim", $data['nim']);
        $this->db->bind(":ruang", $data['ruang']);
        $this->db->bind(":keterangan", $data['keterangan']);
        $this->db->bind(":status", $data['status']);
        $this->db->bind(":pengenal", $data['tanda_pengenal']);
        $this->db->bind(":mulai", $data['mulai']);
        $this->db->bind(":selesai", $data['selesai']);
        $this->db->bind(":tanggal", $data['tanggal']);
        $this->db->bind(":jadwal", $data['jadwal_kelas']);
        $this->db->bind(":mulai_lama", $data['mulai_lama']);
        $this->db->bind(":selesai_lama", $data['selesai_lama']);
        $this->db->bind(":hari_lama", $data['hari_lama']);
        $this->db->bind(":ruang_lama", $data['ruang_lama']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}