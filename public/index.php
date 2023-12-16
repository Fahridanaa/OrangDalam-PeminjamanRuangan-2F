<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\Core\Router;
use OrangDalam\PeminjamanRuangan\Controllers\AuthController;

use OrangDalam\PeminjamanRuangan\Controllers\User\DashboardController;
use OrangDalam\PeminjamanRuangan\Controllers\User\PinjamController;
use OrangDalam\PeminjamanRuangan\Controllers\User\MultiFormController;
use OrangDalam\PeminjamanRuangan\Controllers\User\InboxController;
use OrangDalam\PeminjamanRuangan\Controllers\User\DetailRuanganController;
use OrangDalam\PeminjamanRuangan\Controllers\User\HistoryController;
use OrangDalam\PeminjamanRuangan\Controllers\User\ProfileController;
use OrangDalam\PeminjamanRuangan\Controllers\User\RequestController;
use OrangDalam\PeminjamanRuangan\Controllers\User\PeminjamanController;

use OrangDalam\PeminjamanRuangan\Controllers\Admin\AdminHistoryController;
use OrangDalam\PeminjamanRuangan\Controllers\Admin\AdminInboxController;
use OrangDalam\PeminjamanRuangan\Controllers\Admin\AdminKonfirmasiController;

session_start();


// core
Router::add("GET", "/login", AuthController::class, "showLoginForm");
Router::add("POST", "/login", AuthController::class, "processLogin");
Router::add("GET", "/logout", AuthController::class, "logout");
Router::add("GET", "/dashboard", AuthController::class, "showDashboard");


// // user
Router::add("POST", "/dashboard", DashboardController::class, "showDenah");
Router::add("GET", "/pinjam", PinjamController::class, "showPinjamPage");
Router::add("GET", "/pesan", InboxController::class, "showInboxPage");
Router::add("GET", "/riwayat", HistoryController::class, "showHistoryPage");
Router::add("GET", "/konfirmasi-ruangan", RequestController::class, "showRequestPage");
Router::add("GET", "/profile", ProfileController::class, "showProfile");
Router::add("GET", "/detail", DetailRuanganController::class, "showDetailRuangan");
Router::add("POST", "/profile", AuthController::class, "changePass");
Router::add("GET", "/pinjam/form", MultiFormController::class, "showForm");
Router::add("POST", "/pinjam/form?step=2&category=acara", PeminjamanController::class, "insertAcara");

// admin
Router::add("GET", "/inbox", AdminInboxController::class, "showInbox");
Router::add("GET", "/history", AdminHistoryController::class, "showHistory");
Router::add("GET", "/konfirmasiPinjam", AdminKonfirmasiController::class, "showKonfirmasiPinjamPage");
Router::add("GET", "/download", AdminKonfirmasiController::class, "download");

Router::run();

