<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\Core\Router;
use OrangDalam\PeminjamanRuangan\Controllers\AuthController;
use OrangDalam\PeminjamanRuangan\Controllers\DashboardController;
use OrangDalam\PeminjamanRuangan\Controllers\AdminDashboardController;

use OrangDalam\PeminjamanRuangan\Controllers\MultiFormController;
use OrangDalam\PeminjamanRuangan\Core\RouterMiddleware;


session_start();


// core
Router::add("GET", "/login", AuthController::class, "showLoginForm");
Router::add("POST", "/login", AuthController::class, "processLogin");
Router::add("GET", "/logout", AuthController::class, "logout");

// // user
Router::add("GET", "/dashboard", DashboardController::class, "showDashboard");
Router::add("GET", "/pinjam", DashboardController::class, "showPinjamPage");
Router::add("GET", "/pesan", DashboardController::class, "showInboxPage");
Router::add("GET", "/riwayat", DashboardController::class, "showHistoryPage");
Router::add("GET", "/konfirmasi-ruangan", DashboardController::class, "showRequestPage");

Router::add("GET", "/profile", DashboardController::class, "showRequestProfile");
Router::add("GET", "/profile", DashboardController::class, "showRequesDetailRuangan");

Router::add("GET", "/pinjam/form", MultiFormController::class, "showForm");

// admin
Router::add("GET", "/inbox", AdminDashboardController::class, "showInbox");
Router::add("GET", "/history", AdminDashboardController::class, "showHistory");
Router::add("GET", "/konfirmasiPinjam", AdminDashboardController::class, "showKonfirmasiPinjamPage");

Router::run();

