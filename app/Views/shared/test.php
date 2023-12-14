<?php

use OrangDalam\PeminjamanRuangan\Models\Ruang;

$namaHariInggris = date('l', time());

$daftarTerjemahan = array(
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu',
    'Sunday' => 'Minggu'
);

$namaHariIndonesia = $daftarTerjemahan[$namaHariInggris];

echo $namaHariIndonesia;
