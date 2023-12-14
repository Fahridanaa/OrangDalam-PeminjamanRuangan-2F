<?php

namespace OrangDalam\PeminjamanRuangan\Controllers;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class PeminjamanController extends Controller
{
    private Peminjaman $peminjaman;

    public function __construct()
    {
        $this->peminjaman = new Peminjaman();
    }

    public function showPinjam() {
        return $this->peminjaman->pinjam();
    }

    public function showDetail($id) {
        return $this->peminjaman->detailPinjam($id);
    }

    public function showHistory() {
        return $this->peminjaman->history();
    }

    public function insertAcara() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lantai = $_POST['lantai'];
            $jamMulai = $_POST['acara-jam-mulai'];
            $tanggal = $_POST['acara-tanggal'];
            $jamSelesai = $_POST['acara-jam-selesai'];
            $urgent = isset($_POST['acara-urgent']) ? true : false;
            $keterangan = $_POST['keterangan'];

            // Process uploaded files
            $tandaPengenalFile = $_FILES['acara-surat'];
            $buktiUrgentFile = $_FILES['acara-bukti-urgent'];

            $dir = '/uploads/';
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['acara-bukti-urgent'])) {
                $upload = $dir . basename($_FILES['acara-bukti-urgent']['name']);
                $image = strtolower(pathinfo($upload, PATHINFO_EXTENSION));

                $allow = array('jpg', 'jpeg', 'png', 'gif');
                if (in_array($image, $allow)) {
                    if (move_uploaded_file($_FILES['acara-bukti-urgent']['tmp_name'], $upload)) {
                        echo "File Berhasil Ditambahkan";
                    }
                    else {
                        echo "Gagal Mengunggah File";
                    }
                }
            }

            $data = [
                'event' => $tanggal,
                'mulai' => $jamMulai,
                'selesai' => $jamSelesai,
                'urgent' => $urgent,
                'keterangan' => $keterangan,
                'status' => 'Menunggu Konfirmasi',
                'nim' => $_SESSION['username'],
                'nidn' => null,
                'tandaPengenal' => null
            ];
            if ($this->peminjaman->insert($data) > 0) {
                echo "Success";
            }
        }
    }
}