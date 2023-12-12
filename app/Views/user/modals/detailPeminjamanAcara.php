<div id="detail-peminjaman-acara-modal" class="modal hidden fixed inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="overlay absolute w-full h-full bg-gray-800 opacity-50"></div>
        <div class="flex flex-col px-24 py-12 mx-auto mb-12 bg-white border border-black rounded-xl shadow-[0_4px_4px_0px_#00000025] z-20">
            <?php include __DIR__ . '/../detailAcara.php'; ?>
            <div id="buttons" class="flex justify-around mt-10">
                <button class="close-modal py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
