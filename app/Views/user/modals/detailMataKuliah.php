<?php
function renderDetailMatkulModal(): string
{
    ob_start();
    ?>
    <style>
        .animate-show-modal {
            transition: all 0.3s ease;
        }
    </style>
    <div id="detail-matkul-modal" class="modal hidden absolute inset-0">
        <div class="overlay absolute w-full h-full bg-gray-800 opacity-50"></div>
        <div class="flex items-center justify-center min-h-screen">
            <div class="animate-show-modal flex flex-col px-24 py-12 mx-auto bg-white border border-black rounded-xl shadow-[0_4px_4px_0px_#00000025] z-20 opacity-0 -translate-y-5"
                 id="detailMatkul">
                <?php include __DIR__ . '/../detailMatkul.php'; ?>
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

echo renderDetailMatkulModal();
?>