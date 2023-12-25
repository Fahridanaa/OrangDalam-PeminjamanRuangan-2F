<?php
function renderUploadSuratModal(): string
{
    ob_start();
    ?>
    <style>
        .animate-show-modal {
            transition: all 0.3s ease;
        }
    </style>
    <div id="upload-surat-modal" class="modal hidden absolute inset-0">
        <div class="overlay absolute w-full h-full bg-gray-800 opacity-50"></div>
        <div class="flex items-center justify-center min-h-screen">
            <div class="animate-show-modal flex flex-col px-24 py-12 mx-auto bg-white border border-black rounded-xl shadow-[0_4px_4px_0px_#00000025] z-20 opacity-0 -translate-y-5"
                 id="uploadSuratModal">
                <span class="font-semibold text-3xl text-center mb-3">Upload Surat</span>
                <form class="flex flex-col" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="flex flex-col gap-2">
                        <label for="surat">Upload Surat Peminjaman</label>
                        <input type="file" name="surat" id="surat"
                               class="px-5 py-2 rounded-lg border border-primary-color" required>
                    </div>
                    <div class="flex justify-evenly mt-4">
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
    <?php
    return ob_get_clean();
}

echo renderUploadSuratModal();
?>