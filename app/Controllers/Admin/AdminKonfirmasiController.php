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
                $linkPengenal = '-';
            }
            else {
                $linkPengenal = '<a href="/download?file=' . urlencode($item['tanda_pengenal']) . '">Download Tanda Pengenal</a>';
            }
            if ($item['surat'] == null) {
                $linkSurat = '-';
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
}