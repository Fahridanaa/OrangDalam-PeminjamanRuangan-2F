<?php

namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;
use PDO;

class Jadwal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getJadwalByRuangDanHari($kodeRuang, $namaHari)
    {
        $this->db->query("SELECT 
       TIME_FORMAT(mulai.mulai, '%H:%i') AS mulai,
       TIME_FORMAT(selesai.selesai, '%H:%i') AS selesai, 
       mk.nama AS namaMK, 
       d.nama AS namaDosen, 
       GROUP_CONCAT(k.nama) AS namaKelas 
       FROM jadwal 
       INNER JOIN jp mulai ON mulai.kode = jadwal.mulai
       INNER JOIN jp selesai ON selesai.kode = jadwal.selesai
       INNER JOIN matkul mk ON mk.kode = kode_matkul 
       INNER JOIN dosen d ON d.nidn = nidn_dosen 
       INNER JOIN kelas k ON k.kode = kode_kelas 
       INNER JOIN ruang r ON r.kode = kode_ruang 
       INNER JOIN hari h ON h.id = id_hari WHERE h.nama = :nama AND r.kode = :kode 
       GROUP BY mulai, selesai, namaMk, namaDosen");
        $this->db->bind(":nama", $namaHari);
        $this->db->bind(":kode", $kodeRuang);
        return $this->db->resultSet();
    }

    public function getJadwalByKodeMatkulKelasNidn($kodeMatkul, $kodeKelas, $nidn)
    {
        $this->db->query("SELECT 
                       j.kode AS kodeJadwal,
                       j.id_hari AS idHari,
                       j.mulai AS mulai,
                       j.selesai AS selesai,
                       j.kode_ruang AS ruang
                       FROM jadwal j
                       INNER JOIN matkul mk ON mk.kode = j.kode_matkul 
                       INNER JOIN kelas k ON k.kode = j.kode_kelas 
                       INNER JOIN dosen d ON d.nidn = j.nidn_dosen
                       WHERE mk.kode = :kode_matkul AND k.kode = :kode_kelas AND d.nidn = :nidn");
        $this->db->bind(':kode_matkul', $kodeMatkul);
        $this->db->bind(':kode_kelas', $kodeKelas);
        $this->db->bind(':nidn', $nidn);
        return $this->db->single();
    }

    public function getDosenByKodeKelasMatkul($kodeMatkul, $kodeKelas)
    {
        $this->db->query("SELECT 
                       d.nidn AS nidn
                       FROM jadwal 
                       INNER JOIN matkul mk ON mk.kode = kode_matkul 
                       INNER JOIN dosen d ON d.nidn = nidn_dosen 
                       INNER JOIN kelas k ON k.kode = kode_kelas 
                       WHERE mk.kode = :kode_matkul AND k.kode = :kode_kelas");
        $this->db->bind(':kode_matkul', $kodeMatkul);
        $this->db->bind(':kode_kelas', $kodeKelas);
        return $this->db->single();
    }

    public function getJadwalByKodeKelas($kodeKelas)
    {
        $this->db->query("SELECT 
       TIME_FORMAT(mulai.mulai, '%H:%i') AS mulai,
       TIME_FORMAT(selesai.selesai, '%H:%i') AS selesai, 
       mk.kode AS kode_matkul,
       mk.nama AS namaMK, 
       d.nama AS namaDosen,
       h.nama AS namaHari,
       r.nama AS namaRuang,
       GROUP_CONCAT(k.nama) AS namaKelas 
       FROM jadwal 
       INNER JOIN jp mulai ON mulai.kode = jadwal.mulai
       INNER JOIN jp selesai ON selesai.kode = jadwal.selesai
       INNER JOIN matkul mk ON mk.kode = kode_matkul 
       INNER JOIN dosen d ON d.nidn = nidn_dosen 
       INNER JOIN kelas k ON k.kode = kode_kelas 
       INNER JOIN ruang r ON r.kode = kode_ruang 
       INNER JOIN hari h ON h.id = id_hari WHERE k.kode = :kode 
       GROUP BY mulai, selesai, namaMk, namaDosen, namaHari, namaRuang");
        $this->db->bind(":kode", $kodeKelas);
        return $this->db->resultSet();
    }

    public function getJadwalByDosen($nidnDosen)
    {
        $this->db->query("SELECT 
       TIME_FORMAT(mulai.mulai, '%H:%i') AS mulai,
       TIME_FORMAT(selesai.selesai, '%H:%i') AS selesai, 
       mk.kode AS kode_matkul,
       mk.nama AS namaMK, 
       d.nama AS namaDosen,
       k.kode AS kode_kelas,
       k.nama AS namaKelas,
       h.nama AS namaHari,
       r.nama AS namaRuang,
       GROUP_CONCAT(k.nama) AS namaKelas 
       FROM jadwal 
       INNER JOIN jp mulai ON mulai.kode = jadwal.mulai
       INNER JOIN jp selesai ON selesai.kode = jadwal.selesai
       INNER JOIN matkul mk ON mk.kode = kode_matkul 
       INNER JOIN dosen d ON d.nidn = nidn_dosen 
       INNER JOIN kelas k ON k.kode = kode_kelas 
       INNER JOIN ruang r ON r.kode = kode_ruang 
       INNER JOIN hari h ON h.id = id_hari WHERE d.nidn = :nidn 
       GROUP BY mulai, selesai, namaMk, namaDosen, namaHari, namaRuang");
        $this->db->bind(":nidn", $nidnDosen);
        return $this->db->resultSet();
    }

    public function getJPByKode($kode)
    {
        $this->db->query("SELECT TIME_FORMAT(mulai, '%H:%i') AS mulai, TIME_FORMAT(selesai, '%H:%i') AS selesai FROM jp WHERE kode = :kode");
        $this->db->bind(":kode", $kode);
        return $this->db->single();
    }

    public function getIdHariByName($namaHari)
    {
        $this->db->query("SELECT id, nama FROM hari WHERE nama = :nama");
        $this->db->bind(':nama', $namaHari);
        return $this->db->single();
    }
}