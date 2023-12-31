<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>

<body class="overflow-hidden font-jakarta">
<div class="flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div class="min-h-screen w-full">
        <section class="flex flex-col items-stretch mt-4">
            <div class="flex pb-3 mx-8 mt-8 mb-4 border-b-2 border-black flex-nowrap">
                <h4 class="pl-2 text-3xl font-bold font-jakarta">
                    Inbox Pesan
                </h4>
            </div>
            <?php
            if (!empty($data['notif'])) {
                foreach ($data['notif'] as $notif) {
                    if ($notif['kategori'] == 'Acara/Kegiatan' && $notif['status'] == 'Menunggu Konfirmasi') {
                        echo "<div class=\"flex flex-col px-4 py-4 mx-8 border-b-2 border-black justify-items-stretch\">";
                        echo "<h1 class=\"mb-1 text-3xl font-bold\">{$notif['kategori']}</h1>";
                        echo "<h2 class=\"text-xl font-medium\">{$notif['keterangan']}</h2>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<h1 class=\"mb-1 text-3xl font-semibold text-center\">Tidak ada notifikasi</h1>";
            }
            ?>
    </div>
</div>
</body>

</html>