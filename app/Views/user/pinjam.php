<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>

<body class="h-screen overflow-hidden">
<div id="Peminjaman" class="h-screen flex flex-row">
    <?php
    include 'sidebar.php';

    use OrangDalam\PeminjamanRuangan\Controllers\User\PeminjamanController;

    ?>
    <div id="Peminjaman-content" class="h-screen w-screen px-8 py-20 flex flex-col gap-12 ml-32">
        <div id="header">
            <div id="head" class="flex justify-between mb-6">
                <h1 class="text-4xl font-semibold">Pinjam Ruangan</h1>
                <a class="bg-third-color rounded-full px-10 text-neutral-color align-middle flex items-center cursor-pointer hover:bg-primary-color"
                   href="/pinjam/form?step=1">
                    <span>Pinjam</span>
                </a>
            </div>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <?php
            $data = new PeminjamanController();

            if ($data->showPinjam($_SESSION['username']) == null) {
                echo '<span class="text-xl font-medium">Belum ada Peminjaman</span>';
            } else {
                foreach ($data->showPinjam($_SESSION['username']) as $item) :
                    $status = $item['status'];
                    $color = '';
                    $notif = '';
                    $buttonSurat = '';
                    $deadline = $item['deadline'];
                    $id = $item['id'];

                    switch ($status) {
                        case 'Menunggu Konfirmasi':
                            $color = 'bg-warn-color';
                            break;
                        case 'Diperlukan Surat Izin':
                            $color = 'bg-danger-color';
                            $notif = '<span class="text-danger-color text-lg font-semibold">*Upload Surat Sebelum ' . $deadline . '</span>';
                            $buttonSurat = '<button class="uploads-surat-izin-button font-bold text-sm px-3 py-2 bg-select-color rounded-3xl text-[#ffffff] hover:bg-[#27BD63]">Upload Surat Izin</button>';
                            break;
                        case 'Telah Dikonfirmasi':
                            $color = 'bg-select-color';
                            break;
                    }
                    ?>
                    <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                        <div class="flex w-full justify-between">
                            <div class="flex gap-4">
                                <span class="text-neutral-color px-3 py-1 <?= $color ?> rounded-xl"><?= $item['status']; ?></span>
                                <!--                        tambahi category-->
                                <span class="acara text-neutral-color px-3 py-1 bg-locked-color rounded-xl">Acara</span>
                            </div>
                            <?= $notif ?>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="font-bold text-3xl"><?= $item['kode_ruang']; ?></span>
                            <span class="font-normal text-xl">Digunakan Tanggal <?= $item['tanggalAcara'] ?></span>
                        </div>
                        <div class="self-end flex gap-5">
                            <?= $buttonSurat ?>
                            <!--                      iki class e diganti antara matkul sama acara-->
                            <a href="/pinjam?id=<?php echo $item['id'] ?>"
                               class="detail-acara-button ont-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
                                Detail
                                Peminjaman
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            } ?>
        </div>
    </div>
    <?php include __DIR__ . '/../user/modals/uploadSurat.php'; ?>
    <?php include __DIR__ . '/../user/modals/detailPeminjamanAcara.php'; ?>
    <?php include __DIR__ . '/../user/modals/detailMataKuliah.php'; ?>
</div>
<script>
    const modals = document.querySelectorAll('.modal');
    const uploadSuratButton = document.querySelectorAll('.uploads-surat-izin-button');
    const detailAcaraButton = document.querySelectorAll('.detail-acara-button');
    const detailMatkulButton = document.querySelectorAll('.detail-matkul-button');

    uploadSuratButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[0].classList.remove('hidden');
        })
    })

    detailAcaraButton.forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            modals[1].classList.remove('hidden');
        })
    })

    detailMatkulButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[2].classList.remove('hidden');
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