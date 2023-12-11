<?php
use OrangDalam\PeminjamanRuangan\Controllers\DashboardController;
$dashboard = new DashboardController();

$dashboard = new DashboardController();

$data = array(
    $dashboard->denah("Lantai 5"),
    $dashboard->denah("Lantai 6")
);

var_dump($data);