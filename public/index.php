<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\Core\Router;
use OrangDalam\PeminjamanRuangan\Controllers\AuthController;
use OrangDalam\PeminjamanRuangan\Controllers\DashboardController;

use OrangDalam\PeminjamanRuangan\Controllers\MultiStepFormController;
use OrangDalam\PeminjamanRuangan\Controllers\JurusanController;


session_start();

Router::add("GET", "/login", AuthController::class, "showLoginForm");
Router::add("POST", "/login", AuthController::class, "processLogin");
Router::add("GET", "/logout", AuthController::class, "logout");

Router::add("GET", "/dashboard", DashboardController::class, "showDashboard");
Router::add("GET", "/pinjam", DashboardController::class, "showPinjamPage");
Router::add("GET", "/pesan", DashboardController::class, "showInboxPage");
Router::add("GET", "/riwayat", DashboardController::class, "showHistoryPage");
Router::add("GET", "/konfirmasi-ruangan", DashboardController::class, "showRequestPage");


Router::add("GET", "/pinjam/form", MultiStepFormController::class, "showForm");

Router::add("GET", "/jurusan", JurusanController::class, "showJurusan");


Router::run();
?>