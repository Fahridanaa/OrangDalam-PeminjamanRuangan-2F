<?php

namespace OrangDalam\PeminjamanRuangan\Controllers\User;

use Exception;
use OrangDalam\PeminjamanRuangan\Core\Controller;
use OrangDalam\PeminjamanRuangan\Models\HistoryModel;
use OrangDalam\PeminjamanRuangan\Models\PinjamModel;

class HistoryController extends Controller
{
    private HistoryModel $historyModel;

    public function __construct()
    {
        $middlewareInstance = $this->middleware('AuthMiddleware');
        $middlewareInstance->handleUser();
        $this->historyModel = new HistoryModel();
    }

    public function ShowHistoryPage(): void
    {
        $this->ensureUserIsLoggedIn();
        $this->view('user/history');
    }

    /**
     * @throws Exception
     */
    public function showHistory(int $nim): array
    {
        $this->ensureUserIsLoggedIn();
        return $this->historyModel->history($nim);
    }
}