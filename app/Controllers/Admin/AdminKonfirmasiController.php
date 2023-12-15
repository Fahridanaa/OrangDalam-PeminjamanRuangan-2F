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
            $data = array($item['nama'], $item['ruang'], $item['tanggalAcara'], $item['telepon'] ,'Tanda Pengenal', 'Surat Peminjaman');
            array_push($result, $data);
        }
        return $result;
    }

}