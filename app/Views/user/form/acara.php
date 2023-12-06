<div class="border mx-auto px-24 py-8 flex flex-col justify-between border-black rounded-3xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
    <h1 class="text-center font-semibold text-2xl">Booking Ruangan Acara</h1>
    <form id="booking-form" class="flex flex-col gap-6">
        <div id="input-form" class="flex flex-col gap-2">
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <span>Pilih Lantai</span>
                    <select name="lantai" id="lantai"
                            class="pr-16 pl-8 py-3 rounded-lg border border-primary-color"
                            title="Lantai" required>
                        <option selected disabled hidden>Lantai Ruangan</option>
                        <option value="5">Lantai 5</option>
                        <option value="6">Lantai 6</option>
                        <option value="7">Lantai 7</option>
                        <option value="8">Lantai 8</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <span>Pilih Tanggal</span>
                    <input required type="date" class="pr-16 pl-8 py-2 rounded-lg border border-primary-color">
                </div>
            </div>
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <span>Jam Mulai</span>
                    <input type="number" placeholder="Input jam mulai acara.."
                           class="px-4 py-2 rounded-lg border border-primary-color" required>
                </div>
                <div class="flex flex-col gap-2">
                    <span>Jam Selesai</span>
                    <input type="number" placeholder="Input jam berakhir acara.."
                           class="px-5 py-2 rounded-lg border border-primary-color" required>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <input id="urgent" type="checkbox" class="w-4 h-4" required>
                <span>Urgent</span>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <span>Keterangan</span>
            <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan Acara..."
                      class="p-2 rounded-lg border border-primary-color" required></textarea>
        </div>
        <div class="flex flex-col gap-2">
            <span>Upload Tanda Pengenal</span>
            <input type="file" class="px-5 py-2 rounded-lg border border-primary-color" required>
        </div>
        <div id="bukti" class="flex flex-col gap-2">
            <span>Upload Surat Bukti Urgent</span>
            <input type="file" class="px-5 py-2 rounded-lg border border-primary-color" required>
        </div>
        <div id="buttons" class="flex justify-around">
            <a class="py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer">Kembali</a>
            <button class="py-2 px-8 bg-third-color text-neutral-color rounded-3xl cursor-pointer"
                    type="submit">Lanjut
            </button>
        </div>
    </form>
</div>