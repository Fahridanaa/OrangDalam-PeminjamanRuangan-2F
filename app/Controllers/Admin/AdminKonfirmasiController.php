<?php 


namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class AdminKonfirmasiController extends Controller {

    private Peminjaman $peminjaman;

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
        $this->peminjaman = new Peminjaman();
    }


    public function showKonfirmasiPinjamPage(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/konfirmasiPinjam');
    }

    public function konfirmasi()  {
        $result = array();
        foreach ($this->peminjaman->konfirmasi() as $item) {
            if ($item['tanda_pengenal'] == null) {
                $linkPengenal = 'Belum Ada Tanda Pengenal';
            }
            else {
                $linkPengenal = '<a href="/download?file=' . urlencode($item['tanda_pengenal']) . '">Download Tanda Pengenal</a>';
            }
            if ($item['surat'] == null) {
                $linkSurat = 'Belum Ada Surat';
            }
            else {
                $linkSurat = '<a href="/download?file=' . urlencode($item['surat']) . '">Download Surat</a>';
            }

            $data = array($item['nama'], $item['ruang'], $item['tanggalAcara'], $item['telepon'] , $linkPengenal, $linkSurat, $item['id']);
            array_push($result, $data);
        }
        return $result;
    }

    public function statusKonfirmasi($id) {
        return $this->peminjaman->statusKonfirmasi($id);
    }

    public function download() {
        $file = $_GET['file'];

        $folderPath = 'data/';
        $fileName = $file;
        $filePath = $folderPath . $fileName;

        if (file_exists($filePath)) {
            // Set header untuk melakukan download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Baca file dan kirimkan isinya ke output buffer
            readfile($filePath);
            exit;
        } else {
            echo "File tidak ditemukan.";
        }
    }
}