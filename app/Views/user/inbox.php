<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body>
<div id="Inbox" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="Inbox-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12 ml-32">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Inbox Pesan</h1>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <!--            <span class="text-xl font-medium">Belum ada Notifikasi</span>-->

            <?php 
                if (!empty($data['notifikasi'])) {
                    foreach ($data['notifikasi'] as $notif) {
                        echo '
                        <div class="flex border-2 border-[#7B7777] items-start p-5 rounded-xl gap-3 shadow-[0_4px_4px_0px_#00000025]">
                        <div class="flex flex-auto justify-between">
                            <div class="flex flex-col gap-1">
                                <span class="font-bold text-3xl">'.$notif['jenis'].'</span>
                                <span class="font-normal text-xl text-select-color">'.$notif['jenis'].'</span>
                                <span class="hidden text-sm text-noFocus-color mt-3">'.$notif['keterangan'].'</span>
                            </div>
                            <div>
                                <span class="font-semibold">'.$notif['tanggal'].'</span>
                            </div>
                        </div>
                        <div class="mt-4 mr-4">
                            <button class="inbox-btn transform transition ease-in-out duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                </svg>
                            </button>
                        </div>
                    </div>        
                        ';
                    }
                } else {
                    echo "<h1 class=\"mb-1 text-3xl font-semibold\">Tidak ada notifikasi</h1>";
                }
            ?>
            
            
            <div class="flex border-2 border-[#7B7777] items-start p-5 rounded-xl gap-3 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex flex-auto justify-between">
                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-3xl">Konfirmasi Peminjaman Ruangan</span>
                        <span class="text-xl text-danger-color">Ditolak</span>
                        <span class="hidden text-sm text-noFocus-color mt-3">Alasan:  ACARA GAK PENTING NGAPAIN PINJAM RUANGAN ANJING!!!</span>
                    </div>
                    <div>
                        <span class="font-semibold">Selasa, 21 November 2023</span>
                    </div>
                </div>
                <div class="mt-4 mr-4">
                    <button class="inbox-btn transform transition ease-in-out duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- <div class="flex border-2 border-[#7B7777] items-start p-5 rounded-xl gap-3 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex flex-auto justify-between">
                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-3xl">Permintaan Jadwal mata Kuliah</span>
                        <span class="text-xl text-danger-color">Ditolak</span>
                        <span class="hidden text-sm text-noFocus-color mt-3">Alasan:  Lebih baik online saja, waktunya menyusul akan saya kabari</span>
                    </div>
                    <div>
                        <span class="font-semibold">Selasa, 21 November 2023</span>
                    </div>
                </div>
                <div class="mt-4 mr-4">
                    <button class="inbox-btn transform transition ease-in-out duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script>
    const inboxBtn = document.querySelectorAll('.inbox-btn');

    inboxBtn.forEach((btn) => {
        let keteranganText = btn.parentElement.parentElement.children[0].children[0].children[2];
        btn.addEventListener('click', () => {
            btn.classList.toggle('rotate-180');
            keteranganText.classList.toggle('hidden');
        })
    })
</script>
</body>
</html>
