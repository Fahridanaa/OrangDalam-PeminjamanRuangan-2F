<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>

<body class="h-screen overflow-hidden">
<div id="Peminjaman" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="Peminjaman-content" class="h-screen w-screen px-8 py-20 flex flex-col gap-12">
        <div id="header">
            <div id="head" class="flex justify-between mb-6">
                <h1 class="text-4xl font-semibold">Pinjam Ruangan</h1>
                <a class="bg-third-color rounded-full px-10 text-neutral-color align-middle flex items-center cursor-pointer"
                   href="/pinjam/form">
                    <span>Pinjam</span>
                </a>
            </div>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex justify-center">
            <span class="text-xl font-medium">Belum ada Peminjaman</span>
        </div>
    </div>
</div>
</body>

</html>