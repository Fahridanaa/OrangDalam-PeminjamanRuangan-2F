<div id="upload-surat-modal" class="modal hidden fixed inset-0 overflow-y-auto">
    <?php include __DIR__ . '/../../shared/flashMessage.php'; ?>
    <div class="flex items-center justify-center min-h-screen">
        <div class="overlay absolute w-full h-full bg-gray-800 opacity-50"></div>
        <div class="bg-white py-7 px-28 gap-10 shadow-lg rounded-3xl z-20 flex flex-col items-center">
            <span class="font-semibold text-3xl">Upload Surat</span>
            <form class="flex flex-col gap-12" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <div class="flex flex-col gap-2">
                    <label for="surat">Upload Surat Peminjaman</label>
                    <input type="file" name="surat" id="surat"
                           class="px-5 py-2 rounded-lg border border-primary-color" required>
                </div>
                <div class="flex justify-evenly">
                    <button type="button"
                            class="close-modal bg-danger-color px-10 py-3 text-neutral-color font-semibold text-sm rounded-3xl">
                        Tutup
                    </button>
                    <input type="submit"
                           class="bg-select-color px-10 py-3 text-neutral-color cursor-pointer font-semibold text-sm rounded-3xl">
                </div>
            </form>
        </div>
    </div>
</div>