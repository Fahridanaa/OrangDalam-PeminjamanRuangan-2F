<div class="flex-auto self-stretch flex flex-col justify-between">
    <div class="flex flex-col px-24 py-12 mx-auto mb-12 border border-black rounded-xl shadow-[0_4px_4px_0px_#00000025]">
        <form action="/pinjam/form?step=4" method="POST">
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
            <div id="buttons" class="flex justify-around mt-10">
                <a class="py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer"
                   href="/pinjam/form?step=3">Kembali</a>
                <button class="py-2 px-8 bg-third-color text-neutral-color rounded-3xl cursor-pointer"
                        type="submit">Lanjut
                </button>
            </div>
        </form>
    </div>
</div>