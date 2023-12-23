<?php 


namespace OrangDalam\PeminjamanRuangan\Controllers\Admin;

use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\Notifikasi;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;

class AdminKonfirmasiController extends Controller {

    private Peminjaman $peminjaman;
    private Notifikasi $notifikasi;

    public function __construct() {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleAdmin();
        $this->peminjaman = new Peminjaman();
        $this->notifikasi = new Notifikasi();
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
                $linkPengenal = "-";
            }
            else {
                $linkPengenal = "<button type='button' class='focus:outline-none text-white bg-primary-color dark:bg-primary-color cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2' disabled>
                                    <a href='/download?file=" . urlencode($item['tanda_pengenal']) . "&path=tanda-pengenal' class='download-button' download>
                                        <svg class='h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'>
                                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'></path>
                                        </svg>
                                    </a>
                                </button>";
            }
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

            $data = array($item['nama'], $item['ruang'], $item['tanggalAcara'], $item['telepon'] , $linkPengenal, $linkSurat, $item['id'], $item['nim_mhs'], $item['nidn_dosen']);
            array_push($result, $data);
        }
        return $result;
    }

    public function statusKonfirmasi($id) {
        return $this->peminjaman->statusKonfirmasi($id);
    }

    public function updateStatus() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $status = $_POST['status'];
            $id = $_SESSION['data-id'];
            $ketreangan =  $_POST['keterangan'];
            // $kategori = $_SESSION['data-kategori'];
            switch ($_POST['id']){
                case 'batal-form':
                    $status = 'Dibatalkan';
                    break;
                case 'tolak-form':
                    $status = 'Ditolak';
                    break;
            }

            $dataNotif = [
                    'kategori' => 'Acara/Kegiatan',
                    'status' => $status, 
                    'keterangan' =>  $ketreangan,
                    'tanggal' => date('Y-m-d'),  
                    'nim_mhs' =>  $_SESSION['nim'] ?? null,  
                    'nip_dosen' =>  $_SESSION['nidn'] ?? null
            ];
            
            $this->notifikasi->setNotif($dataNotif);
            $this->peminjaman->updateStatus($status, $id);
        }


        header('Location: /konfirmasiPinjam');
    }
}