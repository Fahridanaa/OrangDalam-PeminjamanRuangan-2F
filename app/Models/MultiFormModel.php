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

    public function insert($data)
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
        return $this->db->rowCount();
    }
}