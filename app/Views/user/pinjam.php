<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>

<body class="h-screen overflow-hidden">
<div id="Peminjaman" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="Peminjaman-content" class="h-screen w-screen py-20">
        <div id="header" class="px-8">
            <div id="head" class="flex justify-between mb-6">
                <h1 class="text-4xl font-semibold">Pinjam Ruangan</h1>
                <button class="bg-third-color  rounded-full px-10 text-neutral-color">Pinjam</button>
            </div>
            <hr class="border border-black">
        </div>
        <div id="card-container">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
</body>

</html>