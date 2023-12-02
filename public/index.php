<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\Core\Router;
use OrangDalam\PeminjamanRuangan\Controllers\AuthController;

Router::add("GET", "/login", AuthController::class, "showLoginForm");
Router::add("POST", "/login", AuthController::class, "processLogin");

if(isset($_SESSION['username'])) {
    Router::add("GET", "/", AuthController::class, "showDashboard");
    Router::add("GET", "/logout", AuthController::class, "logout");
}

Router::run();

?>