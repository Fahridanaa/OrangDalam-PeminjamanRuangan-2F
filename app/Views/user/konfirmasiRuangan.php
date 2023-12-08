<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body>
<div id="Konfirmasi" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="Konfirmasi-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Konfirmasi Ruangan Mata Kuliah</h1>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <!--            <span class="text-xl font-medium">Belum ada Permintaan</span>-->
            <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex w-full justify-between">
                    <span class="text-neutral-color px-3 py-1 bg-warn-color rounded-xl">Perlu Konfirmasi</span>
                </div>
                <div class="flex w-full justify-between">
                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-3xl">Basis Data Lanjut</span>
                        <span class="font-normal text-xl">Ruangan Perangkat Lunak 1</span>
                    </div>
                    <div class="items-center flex gap-5">
                        <button id="cek"
                                class="font-bold text-sm px-6 py-2 bg-danger-color rounded-3xl text-[#ffffff] hover:bg-[#A52F15]">
                            Tolak Perubahan
                        </button>
                        <button class="font-bold text-sm px-10 py-2 bg-select-color rounded-3xl text-neutral-color hover:bg-[#27BD63]">
                            Konfirmasi
                        </button>
                    </div>
                </div>
                <div class="self-end flex gap-5">
                    <button class="text-xl flex items-center gap-3">
                        <span>
                        Detail Informasi
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>

                    </button>
                </div>
            </div>
            <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex w-full justify-between">
                    <span class="text-neutral-color px-3 py-1 bg-select-color rounded-xl">Terkonfirmasi</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="font-bold text-3xl">Algoritma dan Struktur Data</span>
                    <span class="font-normal text-xl">Ruangan Perangkat Lunak 1 </span>
                </div>
                <div class="self-end flex gap-5">
                    <button class="text-xl flex items-center gap-3">
                        <span>
                        Detail Informasi
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex w-full justify-between">
                    <span class="text-neutral-color px-3 py-1 bg-danger-color rounded-xl">Dibatalkan</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="font-bold text-3xl">Kecerdasan Buatan</span>
                    <span class="font-normal text-xl">Ruangan Perangkat Lunak 1 </span>
                </div>
                <div class="self-end flex gap-5">
                    <button class="text-xl flex items-center gap-3">
                        <span>
                        Detail Informasi
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--    <div id="tolak-perubahan-modal" class="modal hidden fixed inset-0 overflow-y-auto">-->
    <!--        <div class="flex items-center justify-center min-h-screen">-->
    <!--            <div class="modal-overlay absolute w-full h-full bg-gray-800 opacity-50"></div>-->
    <!--            <div class="bg-white py-7 px-28 gap-10 shadow-lg rounded-3xl z-20 flex flex-col items-center">-->
    <!--                <span class="font-semibold text-3xl">Upload Surat</span>-->
    <!--                <form class="flex flex-col gap-12">-->
    <!--                    <div class="flex flex-col gap-2">-->
    <!--                        <label for="keterangan">keterangan</label>-->
    <!--                        <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan Acara..."-->
    <!--                                  class="p-2 rounded-lg border border-primary-color" required></textarea>-->
    <!--                    </div>-->
    <!--                    <div class="flex gap-32">-->
    <!--                        <button type="button"-->
    <!--                                class="bg-danger-color px-10 py-3 text-neutral-color font-semibold text-sm rounded-3xl">-->
    <!--                            Tutup-->
    <!--                        </button>-->
    <!--                        <input type="submit"-->
    <!--                               class="bg-third-color px-10 py-3 text-neutral-color cursor-pointer font-semibold text-sm rounded-3xl">-->
    <!--                    </div>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div id="offer-request-modal" class="modal hidden fixed inset-0 overflow-y-auto">-->
    <!--        <div class="flex items-center justify-center min-h-screen">-->
    <!--            <div class="modal-overlay absolute w-full h-full bg-gray-800 opacity-50"></div>-->
    <!--            <div class="bg-white w-1/4 py-7 px-14 gap-10 shadow-lg rounded-3xl z-20 flex flex-col">-->
    <!--                <span class="font-semibold text-2xl text-center">Ingin Melakukan Request Pemindahan Mata Kuliah?</span>-->
    <!--                <div class="flex flex-col gap-2">-->
    <!--                    <button type="button"-->
    <!--                            class="bg-third-color px-10 py-3 text-neutral-color cursor-pointer font-semibold text-sm rounded-3xl">-->
    <!--                        Iya-->
    <!--                    </button>-->
    <!--                    <button type="button"-->
    <!--                            class="bg-danger-color px-10 py-3 text-neutral-color font-semibold text-sm rounded-3xl">-->
    <!--                        Tutup-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
</div>
</body>
</html>
