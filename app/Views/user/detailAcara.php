<h1 class="font-semibold text-center text-2xl mb-8 mx-auto">Detail Booking Ruangan</h1>
<div class="flex flex-col justify-between flex-1 gap-2">
    <div class="flex flex-col">
        <span class="font-bold text-xl">Nama</span>
        <span class="text-xl"><?php echo $_SESSION['user']['nama'] ?? ''; ?></span>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">Jurusan</span>
        <span class="text-xl"><?php echo $_SESSION['user']['jurusan'] ?? ''; ?></span>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">No Telepon</span>
        <span class="text-xl"><?php echo $_SESSION['user']['telepon'] ?? ''; ?></span>
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col flex-auto">
                    <span class="font-bold text-xl">
                        Lantai
                    </span>
            <span class="text-xl">
                        <?php echo $_SESSION['formPinjam']['lantai'] ?? ''; ?>
                    </span>
        </div>
        <div class="flex flex-col w-1/4">
                    <span class="font-bold text-xl">
                        Ruangan
                    </span>
            <span class="text-xl">
                        <?php foreach ($_SESSION['formPinjam']['ruangan'] as $ruang) {
                            echo $_SESSION['formPinjam']['ruangan'][$ruang] ?? '';
                            echo ', ';
                        } ?>
                    </span>
        </div>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">Keterangan</span>
        <span class="text-xl"><?php echo $_SESSION['formPinjam']['acara-keterangan'] ?? ''; ?></span>
    </div>
    <div class="flex flex-col">
        <span class="font-bold text-xl">Tanggal Acara</span>
        <span class="text-xl"><?php echo $_SESSION['formPinjam']['acara-tanggal'] ?? ''; ?></span>
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="font-bold text-xl">Jam Mulai</span>
            <span class="text-xl"><?php echo $_SESSION['formPinjam']['acara-jam-mulai'] ?? ''; ?></span>
        </div>
        <div class="flex flex-col">
            <span class="font-bold text-xl">Jam Selesai</span>
            <span class="text-xl"><?php echo $_SESSION['formPinjam']['acara-jam-selesai'] ?? ''; ?></span>
        </div>
    </div>
</div>

