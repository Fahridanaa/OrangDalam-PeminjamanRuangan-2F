<?php
function renderDetailAcaraModal(): string
{
    ob_start();
    ?>
    <style>
        .animate-show-modal {
            transition: all 0.3s ease;
        }
    </style>
    <div id="detail-peminjaman-acara-modal" class="modal hidden absolute inset-0">
        <div class="overlay absolute w-full h-full bg-gray-800 opacity-50"></div>
        <div class="flex items-center justify-center min-h-screen">
            <div class="animate-show-modal flex flex-col px-24 py-12 mx-auto bg-white border border-black rounded-xl shadow-[0_4px_4px_0px_#00000025] z-20 opacity-0 -translate-y-5"
                 id="detailAcara">
                <div>
                    <h1 class="modal-content font-semibold text-center text-2xl mb-8 mx-auto">Detail Booking
                        Ruangan</h1>
                    <div class="flex flex-col justify-between flex-1 gap-2">
                        <div class="flex justify-between">
                            <div class="flex flex-col">
                                <span class="font-bold text-xl">Lantai</span>
                                <span class="text-xl" id="lantai-span"></span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl">Ruangan</span>
                            <span class="text-xl" id="ruang-span"></span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl">Tanggal Acara</span>
                            <span class="text-xl" id="tanggalAcara-span"></span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl">Keterangan</span>
                            <span class="text-xl" id="keterangan-span"></span>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex flex-col">
                                <span class="font-bold text-xl">Jam Mulai</span>
                                <span class="text-xl" id="mulai-span"></span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-xl">Jam Selesai</span>
                                <span class="text-xl" id="selesai-span"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="buttons" class="flex justify-around mt-10">
                    <button class="close-modal py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

echo renderDetailAcaraModal();
?>