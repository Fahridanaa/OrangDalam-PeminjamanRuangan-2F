<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use config\Database;
use Exception;
use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\PinjamModel;

class PinjamController extends Controller
{
    private PinjamModel $pinjam;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->pinjam = new PinjamModel();
    }

    public function showPinjamPage(): void
    {
        $this->ensureUserIsLoggedIn();
        $this->view('user/pinjam');
    }

    /**
     * @throws Exception
     */
    public function showDetail(): void
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
            $data = $this->pinjam->detailPinjam($id);

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

    /**
     * @throws Exception
     */
    public function showPinjam(int $nim): array // Add strict type hint
    {
        // Ensure user is logged in
        $this->ensureUserIsLoggedIn();
        return $this->pinjam->pinjam($nim);
    }

    private function ensureUserIsLoggedIn(): void // Extract login check to a separate method
    {
        if (!($this->loginCheck())) {
            header('Location: /login');
            exit();
        }
    }
}

?>