<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body>
<div id="Inbox" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="Inbox-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Inbox Pesan</h1>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex justify-center">
            <span class="text-xl font-medium">Belum ada Konfirmasi</span>
        </div>
    </div>
</div>
</body>
</html>
