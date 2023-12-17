<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\Core\{
    Router,
    Controller
};

use OrangDalam\PeminjamanRuangan\Controllers\{
    AuthController,
    User\DashboardController,
    User\PinjamController,
    User\MultiFormController,
    User\InboxController,
    User\DetailRuanganController,
    User\HistoryController,
    User\ProfileController,
    User\RequestController,
    Admin\AdminHistoryController,
    Admin\AdminInboxController,
    Admin\AdminKonfirmasiController
};

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

addCoreRoutes();
addUserRoutes();
addFormRoutes();
addAdminRoutes();


Router::run();

function addCoreRoutes()
{
    // core
    Router::add("GET", "/login", AuthController::class, "showLoginForm");
    Router::add("POST", "/login", AuthController::class, "processLogin");
    Router::add("GET", "/logout", AuthController::class, "logout");
    Router::add("GET", "/dashboard", AuthController::class, "showDashboard");
}

function addUserRoutes()
{
    // user
    Router::add("POST", "/dashboard", DashboardController::class, "showDenah");
    Router::add("GET", "/pinjam", PinjamController::class, "showPinjamPage");
    Router::add("GET", "/pinjam/data", PinjamController::class, "showDetail");
    Router::add("GET", "/pesan", InboxController::class, "showInboxPage");
    Router::add("GET", "/riwayat", HistoryController::class, "showHistoryPage");
    Router::add("GET", "/konfirmasi-ruangan", RequestController::class, "showRequestPage");
    Router::add("GET", "/profile", ProfileController::class, "showProfile");
    Router::add("GET", "/detail", DetailRuanganController::class, "showDetailRuangan");
    Router::add("POST", "/profile", AuthController::class, "changePass");
}

function addFormRoutes()
{
    // form
    Router::add("GET", "/pinjam/form", MultiFormController::class, "showForm");
    Router::add("POST", "/pinjam/form", MultiFormController::class, "handleForm");
}

function addAdminRoutes()
{
    // admin
    Router::add("GET", "/inbox", AdminInboxController::class, "showInbox");
    Router::add("GET", "/history", AdminHistoryController::class, "showHistory");
    Router::add("GET", "/konfirmasiPinjam", AdminKonfirmasiController::class, "showKonfirmasiPinjamPage");
    Router::add("GET", "/download", Controller::class, "download");

}