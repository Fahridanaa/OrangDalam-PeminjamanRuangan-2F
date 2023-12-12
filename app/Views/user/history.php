<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php';
    use OrangDalam\PeminjamanRuangan\Controllers\PeminjamanController;
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
            foreach ($data->showHistory() as $item) :
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
                    <div class="flex w-full justify-between">
                        <span class="text-neutral-color px-3 py-1 <?= $color ?> rounded-xl"><?= $item['status'];?></span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-3xl"><?= $item['kode_ruang'];?></span>
                        <span class="font-normal text-xl">Digunakan Tanggal <?= $item['tanggalAcara'];?></span>
                    </div>
                    <div class="self-end flex gap-5">
                        <button class="font-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
                            Detail
                            Peminjaman
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>