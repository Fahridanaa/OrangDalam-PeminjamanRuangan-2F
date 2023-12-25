<?php

namespace OrangDalam\PeminjamanRuangan\Core;

use OrangDalam\PeminjamanRuangan\Models\AuthModel;

class Controller
{

    protected function view($view, $data = [])
    {
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';
        extract($data);
        include $viewPath;
    }

    protected function middleware($middleware)
    {
        $middlewareClass = "OrangDalam\PeminjamanRuangan\Middleware\\" . $middleware;
        return new $middlewareClass;
    }

    private function loginCheck(): bool
    {
        return isset($_SESSION['user']);
    }

    protected function ensureUserIsLoggedIn(): void // Extract login check to a separate method
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }
    }

    public function download()
    {
        $file = $_GET['file'];
        $path = $_GET['path'];

        $folderPath = '../data/uploads/acara/' . $path . '/';
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
            echo "File Tidak Ditemukan";
        }
    }

    public function getDayNow($date)
    {
        $namaHariInggris = date('l', $date);

        $daftarTerjemahan = array(
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        );

        $namaHariIndonesia = $daftarTerjemahan[$namaHariInggris];

        return $namaHariIndonesia;
    }
}
