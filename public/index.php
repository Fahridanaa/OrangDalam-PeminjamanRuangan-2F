<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\Core\Router;
use OrangDalam\PeminjamanRuangan\Controllers\AuthController;
use OrangDalam\PeminjamanRuangan\Controllers\DashboardController;
use OrangDalam\PeminjamanRuangan\Controllers\AdminDashboardController;

use OrangDalam\PeminjamanRuangan\Controllers\MultiFormController;


session_start();

Router::add("GET", "/login", AuthController::class, "showLoginForm");
Router::add("POST", "/login", AuthController::class, "processLogin");
Router::add("GET", "/logout", AuthController::class, "logout");

Router::add("GET", "/dashboard", DashboardController::class, "showDashboard");
Router::add("POST", "/dashboard", DashboardController::class, "showDenah");
Router::add("GET", "/pinjam", DashboardController::class, "showPinjamPage");
Router::add("GET", "/pesan", DashboardController::class, "showInboxPage");
Router::add("GET", "/riwayat", DashboardController::class, "showHistoryPage");
Router::add("GET", "/konfirmasi-ruangan", DashboardController::class, "showRequestPage");

Router::add("GET", "/pinjam/form", MultiFormController::class, "showForm");


Router::add("GET", "/profile", DashboardController::class, "showRequestProfile");
Router::add("GET", "/profile", DashboardController::class, "showRequesDetailRuangan");
Router::add("POST", "/profile", AuthController::class, "changePass");


// admin
Router::add("GET", "/konfirmasiPinjam", AdminDashboardController::class, "showKonfirmasiPinjamPage");
Router::add("GET", "/inbox", AdminDashboardController::class, "showInbox");
Router::add("GET", "/history", AdminDashboardController::class, "showHistory");

Router::add("GET", "/test", DashboardController::class, "showTest");

Router::run();
?>