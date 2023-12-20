<?php 

namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class AdminDashboardController extends Controller {
    private Peminjaman $peminjaman;

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
        $this->peminjaman = new Peminjaman();
    }


    public function showDashboard(): void
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }

        $this->view('admin/Admindashboard');
    }

    public function sum() {
        return $this->peminjaman->count();
    }
    public function top() {
        $result = array();
        foreach ($this->peminjaman->top() as $item) {
            if ($item['surat'] == null) {
                $linkSurat = "-";
            }
            else {
                $linkSurat = "<button type='button' class='focus:outline-none text-white bg-primary-color dark:bg-primary-color cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2' disabled>
                                    <a href='/download?file=" . urlencode($item['surat']) . "&path=surat' class='download-button' download>
                                        <svg class='h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'>
                                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'></path>
                                        </svg>
                                    </a>
                                </button>";;
            }
            $data = array($item['nama'], $item['jurusan'], $item['ruang'], $item['keterangan'], $item['tanggalPeminjaman'], $item['tanggalAcara'], $linkSurat);
            array_push($result, $data);
        }
        return $result;
    }
}