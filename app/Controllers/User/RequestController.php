<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use Exception;
use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\DosenPengampu;
use OrangDalam\PeminjamanRuangan\Models\Jadwal;
use OrangDalam\PeminjamanRuangan\Models\Matkul;
use OrangDalam\PeminjamanRuangan\Models\Notifikasi;
use OrangDalam\PeminjamanRuangan\Models\Peminjaman;
use OrangDalam\PeminjamanRuangan\Models\Ruang;

class RequestController extends Controller
{
    private DosenPengampu $dosenPengampu;
    private Matkul $matkul;
    private Jadwal $jadwal;
    private Ruang $ruang;
    private Peminjaman $peminjaman;
    private Notifikasi $notifikasi;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->dosenPengampu = new DosenPengampu();
        $this->matkul = new Matkul();
        $this->jadwal = new Jadwal();
        $this->ruang = new Ruang();
        $this->peminjaman = new Peminjaman();
        $this->notifikasi = new Notifikasi();
    }

    public function ShowRequestPage(): void
    {
        $this->ensureUserIsLoggedIn();
        $this->view('user/konfirmasiRuangan');
    }

    public function showDetailMatkul(): void
    {
        try {
            $this->ensureUserIsLoggedIn();

            $id = $_GET['id'] ?? null;
            if ($id === null) {
                http_response_code(400);
                echo json_encode(['error' => 'Id not provided']);
                exit;
            }

            $id = (int)$id;
            $data = $this->peminjaman->detailMatkul($id);

            header('Content-Type: application/json');
            echo json_encode($data);
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }

    public function getJadwal()
    {
        if ($_SESSION['level'] == 'Mahasiswa') {
            return $this->jadwal->getJadwalByKodeKelas($_SESSION['user']['kelas']);
        }
        if ($_SESSION['level'] == 'Dosen') {
            return $this->jadwal->getJadwalByDosen($_SESSION['user']['nidn']);
        }
        return null;
    }

    public function getjp()
    {
        return $this->dosenPengampu->jp();
    }

    public function getJPByKode($kode)
    {
        return $this->jadwal->getJPByKode($kode);
    }

    public function getDosenByNidn($nidn)
    {
        return $this->dosenPengampu->dosenByNidn($nidn);
    }

    public function getMatkulByKode($kode)
    {
        return $this->matkul->matkulByKode($kode);
    }

    public function getKelasByKode($kode) {
        return $this->jadwal->getKelasByKode($kode);
    }

    public function getDay($date)
    {
        return $this->getDayNow($date);
    }

    public function denah($lantai, $bagian, $posisi)
    {
        $data = array();
        foreach ($this->ruang->show($lantai, $bagian, $posisi) as $item) {
            $data[$item['kode']] = $this->status($item['kode']);
        }
        return $data;
    }

    public function status($kode)
    {
        $result = 0;
        $data = [];
        $waktuMulai = '07:00';
        $waktuSelesai = '17:10';
        if ($_SESSION['formPinjam']['category'] == 'acara') {
            $time = $_SESSION['formPinjam']['acara-tanggal'];
            $mulai = $_SESSION['formPinjam']['acara-jam-mulai'];
            $selesai = $_SESSION['formPinjam']['acara-jam-selesai'];
            $tanggal = $_SESSION['formPinjam']['acara-tanggal'];
            $dayNumber = date('N', strtotime($time));
            $data['ruang'] = $kode;
            $data['mulai'] = $mulai;
            $data['tanggal'] = $tanggal;
            if ($dayNumber > 1 && $dayNumber < 6) {
                if ($mulai >= $waktuMulai && $selesai <= $waktuSelesai) {
                    $result = 1;
                } else {
                    $result = $this->peminjaman->statusAcara($data);
                }
            } else {
                $result = $this->peminjaman->statusAcara($data);
            }
        } elseif ($_SESSION['formPinjam']['category'] == 'matkul') {
            $time = $_SESSION['formPinjam']['tanggal-matkul'];
            $data['hari'] = $this->getDayNow(strtotime($time));
            $data['ruang'] = $kode;
            $data['mulai'] = (int)$_SESSION['formPinjam']['jam-selesai-matkul'];
            $data['selesai'] = (int)$_SESSION['formPinjam']['jam-mulai-matkul'];
            $result = $this->ruang->statusSelectRuang($data);
        }

        $bg = '';

        if ($result > 0) {
            $bg =  'locked';
        }
        else {
            /*if (isset($_SESSION['formPinjam']['ruangan'][$kode])) {
                $bg = 'select';
            }
            else {
                $bg = 'disable';
            }*/
            $bg = 'disable';
        }
        return $bg;
    }

    public function getRequest($nidn)
    {
        return $this->peminjaman->request($nidn);
    }

    public function updateStatus()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $status = $_POST['status'];
            $_SESSION['status'] = $status;
            $id = $_POST['index'] ?? $_POST['idx'];
            $keterangan = $_POST['keterangan'] ?? 'Selamat Request Anda Diterima';

            $this->peminjaman->updateRequest($status, $id);

            $data = $this->peminjaman->req($id);
            $sts = $status;
            if ($sts == 'Terkonfirmasi') {
                $sts = 'Telah Dikonfirmasi';
            }
            $dataNotif = [
                'kategori' => 'Pemindahan Jadwal',
                'status' => $sts,
                'keterangan' => $keterangan,
                'tanggal' => date('Y-m-d H:i:s'),
                'nim_mhs' => ($_SESSION['level'] == 'Dosen') ? $data['meminta'] : null,
                'nip_dosen' => ($_SESSION['level'] == 'Mahasiswa') ?$data['meminta'] : null
            ];
    
            $this->notifikasi->setNotif($dataNotif);

            $data = $this->peminjaman->req($id);

            if ($data['status'] == 'Terkonfirmasi') {
                $value = [
                    'ruang' => $data['ruang'],
                    'hari' => $data['hari'],
                    'mulai'=> $data['mulai'],
                    'selesai' => $data['selesai'],
                    'jadwal' => $data['jadwal_kelas']
                ];
        
                $this->jadwal->update($value);
            }
            elseif ($data['status'] == 'Selesai') {
                $value = [
                    'ruang' => $data['ruang_lama'],
                    'hari' => $data['hari_lama'],
                    'mulai'=> $data['mulai_lama'],
                    'selesai' => $data['selesai_lama'],
                    'jadwal' => $data['jadwal_kelas']
                ];
                $this->jadwal->update($value);
            }


        }
        header('Location: /konfirmasi-ruangan');
    }
}