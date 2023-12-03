<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\Core\Router;
use OrangDalam\PeminjamanRuangan\Controllers\AuthController;
use OrangDalam\PeminjamanRuangan\Controllers\DashboardController;

session_start();

Router::add("GET", "/login", AuthController::class, "showLoginForm");
Router::add("POST", "/login", AuthController::class, "processLogin");
Router::add("GET", "/logout", AuthController::class, "logout");

Router::add("GET", "/", DashboardController::class, "showDashboard");
Router::add("GET", "/pinjam", DashboardController::class, "showPinjamPage");




Router::run();
?>