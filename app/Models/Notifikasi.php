<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class Notifikasi
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // buat nampilkan data notif
    public function getNotif($id)
    {
        $this->db->query("SELECT jenis, keterangan, tanggal FROM notifikasi
        WHERE nim_mhs = :id OR nip_admin = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function getNotifAdmin()
    {
        $this->db->query("SELECT jenis, keterangan, tanggal FROM notifikasi");
        return $this->db->resultSet();
    }

    // parameter & variabel e sesuaikan ae rek 
    public function setNotif($data)
    {
        $this->db->query("INSERT INTO notifikasi (jenis, keterangan, tanggal, nim_mhs, nip_dosen) 
        VALUES ()  ");
        $this->db->bind('jenis', $data['jenis']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('nim_mhs', $data['nim_mhs']);
        $this->db->bind('nip_dosen', $data['nip_dosen']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
