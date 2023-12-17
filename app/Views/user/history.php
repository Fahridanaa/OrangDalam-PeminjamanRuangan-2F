<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php';

    use OrangDalam\PeminjamanRuangan\Controllers\User\PeminjamanController;

    ?>
</head>
<body>
<div id="History" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="History-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12 ml-32">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Riwayat Peminjaman</h1>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <!--            <span class="text-xl font-medium">Belum ada Riwayat Peminjaman</span>-->
            <?php
            $data = new PeminjamanController();
            foreach ($data->showHistory($_SESSION['username']) as $item) :
                $status = $item['status'];
                $color = '';

                switch ($status) {
                    case 'Peminjaman Gagal':
                        $color = 'bg-danger-color';
                        break;
                    case 'Peminjaman Berhasil':
                        $color = 'bg-select-color';
                        break;
                }
                ?>
                <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                    <div class="flex w-full gap-4">
                        <span class="text-neutral-color px-3 py-1 <?= $color ?> rounded-xl"><?= $item['status']; ?></span>
                        <span class="acara text-neutral-color px-3 py-1 bg-locked-color rounded-xl">Acara</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-3xl"><?= $item['kode_ruang']; ?></span>
                        <span class="font-normal text-xl">Digunakan Tanggal <?= $item['tanggalAcara']; ?></span>
                    </div>
                    <div class="self-end flex gap-5">
                        <a href="/riwayat?id=<?php echo $item['id'] ?>"
                           class="detail-acara-button font-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
                            Detail
                            Peminjaman
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include __DIR__ . '/modals/detailPeminjamanAcara.php'; ?>
    <?php include __DIR__ . '/modals/detailMataKuliah.php'; ?>
</div>
<script>
    const modals = document.querySelectorAll('.modal');
    const detailAcaraButton = document.querySelectorAll('.detail-acara-button');
    const detailMatkulButton = document.querySelectorAll('.detail-matkul-button');


    detailAcaraButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[0].classList.remove('hidden');
        })
    })

    detailMatkulButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[1].classList.remove('hidden');
        })
    })

    modals.forEach((modal) => {
        const overlay = modal.querySelector('.overlay');
        const closeModal = modal.querySelector('.close-modal');

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        })

        overlay.addEventListener('click', () => {
            modal.classList.add('hidden');
        })
    })
</script>
</body>
</html>