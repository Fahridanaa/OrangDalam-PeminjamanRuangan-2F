<div id="tolak-pemindahan-matkul-modal" class="modal hidden fixed inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="overlay absolute w-full h-full bg-gray-800 opacity-50"></div>
        <div class="bg-white py-7 px-28 gap-10 shadow-lg rounded-3xl z-20 flex flex-col items-center">
            <span class="font-semibold text-3xl">Tolak Pindah Mata Kuliah</span>
            <form method="POST" action="/konfirmasi-ruangan" class="flex flex-col gap-12">
                <input type="hidden" name="status" id="status" value="Dibatalkan">
                <input type="hidden" name="index" id="index" value="">
                <div class="flex flex-col gap-2">
                    <label for="keterangan">keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan Acara..."
                              class="p-2 rounded-lg border border-primary-color" required></textarea>
                </div>
                <div class="flex gap-32">
                    <button type="button"
                            class="close-modal bg-danger-color px-10 py-3 text-neutral-color font-semibold text-sm rounded-3xl">
                        Tutup
                    </button>
                    <input type="submit"
                           class="bg-third-color px-10 py-3 text-neutral-color cursor-pointer font-semibold text-sm rounded-3xl">
                </div>
            </form>
        </div>
    </div>
</div>
