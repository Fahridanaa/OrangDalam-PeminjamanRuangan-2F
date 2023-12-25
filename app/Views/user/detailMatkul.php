<?php
use OrangDalam\PeminjamanRuangan\Controllers\User\RequestController;
$data = new RequestController();
$tanggal = date("d-m-Y", strtotime($_SESSION['formPinjam']['tanggal-matkul']));
$hari = $data->getDay(strtotime($_SESSION['formPinjam']['tanggal-matkul']));
?>

<h1 class="font-semibold text-center text-2xl mb-8 mx-28">Detail Pindah Jam Mata Kuliah</h1>
<div class="grid grid-cols-2 gap-x-8">
    <div class="flex flex-col mb-4 col-span-2">
        <label class="font-bold text-xl">Nama</label>
        <span class="text-xl"><?php echo $_SESSION['user']['nama'] ?? ''; ?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">Jurusan</label>
        <span class="text-xl"><?php echo $_SESSION['user']['jurusan'] ?? ''; ?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">No Telepon</label>
        <span class="text-xl"><?php echo $_SESSION['user']['telepon'] ?? ''; ?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">Lantai</label>
        <span class="text-xl"><?php echo $_SESSION['formPinjam']['lantai'] ?? ''; ?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">Ruangan</label>
        <span class="text-xl"><?php foreach ($_SESSION['formPinjam']['ruangan'] as $ruang) {
                echo $_SESSION['formPinjam']['ruangan'][$ruang] ?? '';
                echo ', ';
            } ?>
        </span>
    </div>

    <div class="flex flex-col mb-4 col-span-2">
        <label class="font-bold text-xl">Keterangan</label>
        <span class="text-xl"><?php echo $_SESSION['formPinjam']['matkul-keterangan'] ?? ''; ?></span>
    </div>

    <div class="flex flex-col mb-4 col-span-2">
        <label class="font-bold text-xl">Tanggal</label>
        <span class="text-xl"><?php echo $hari . ', ' . $tanggal?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">Mata Kuliah</label>
        <span class="text-xl"><?php echo $data->getMatkulByKode($_SESSION['formPinjam']['matkul'])['nama']; ?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">Dosen Pengampu</label>
        <span class="text-xl"><?php echo $data->getDosenByNidn($_SESSION['formPinjam']['dosen-pengampu'])['nama']; ?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">Jam Mulai Matkul</label>
        <span class="text-xl"><?php echo $data->getJPByKode($_SESSION['formPinjam']['jam-mulai-matkul'])['mulai']; ?></span>
    </div>

    <div class="flex flex-col mb-4">
        <label class="font-bold text-xl">Jam Berakhir Matkul</label>
        <span class="text-xl"><?php echo $data->getJPByKode($_SESSION['formPinjam']['jam-selesai-matkul'])['selesai']; ?></span>
    </div>
</div>