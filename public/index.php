<?php
require_once __DIR__ . '/../vendor/autoload.php';

use OrangDalam\PeminjamanRuangan\App\Router;
use OrangDalam\PeminjamanRuangan\Controllers\AuthController;

Router::add("GET", "/login", AuthController::class, "showLoginForm");

Router::run();

?>