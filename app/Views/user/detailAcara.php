<?php
use OrangDalam\PeminjamanRuangan\Controllers\PeminjamanController;

$user = new PeminjamanController();
$id = $_GET['id'];
$data = $user->showDetail($id);
?>

<h1 class="font-semibold text-center text-2xl mb-8 mx-28">Detail Booking Ruangan</h1>
<div class="flex flex-col justify-between flex-1 gap-2">
    <div class="flex flex-col">
        <span class="font-bold text-xl">Nama</span>
        <span class="text-xl"><?php echo $data['nama']; ?></span>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">Jurusan</span>
        <span class="text-xl"><?php echo $data['jurusan']; ?></span>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">No Telepon</span>
        <span class="text-xl"><?php echo $data['telepon']; ?></span>
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col">
                    <span class="font-bold text-xl">
                        Lantai
                    </span>
            <span class="text-xl">
                        <?php echo $data['lantai']; ?>
                    </span>
        </div>
        <div class="flex flex-col">
                    <span class="font-bold text-xl">
                        Ruangan
                    </span>
            <span class="text-xl">
                        <?php echo $data['ruang']; ?>
                    </span>
        </div>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">Keterangan</span>
        <span class="text-xl"><?php echo $data['keterangan']; ?></span>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">Tanggal Acara</span>
        <span class="text-xl"><?php echo $data['tanggalAcara']; ?></span>
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="font-bold text-xl">Mulai</span>
            <span class="text-xl"><?php echo $data['mulai']; ?></span>
        </div>
        <div class="flex flex-col">
            <span class="font-bold text-xl">Selesai</span>
            <span class="text-xl"><?php echo $data['selesai']; ?></span>
        </div>
    </div>
</div>

