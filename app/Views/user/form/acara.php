<div class="border mx-auto px-24 py-8 flex flex-col justify-between border-black rounded-3xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
    <h1 class="text-center font-semibold text-2xl">Booking Ruangan Acara</h1>
    <form method="post" id="booking-form" class="flex flex-col gap-6">
        <div id="input-form" class="flex flex-col gap-2">
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <label for="acara-lantai">Pilih Lantai</label>
                    <select name="lantai" id="acara-lantai"
                            class="pr-16 pl-3 py-3 rounded-lg border border-primary-color"
                            title="Lantai" required>
                        <option selected disabled hidden>Lantai Ruangan</option>
                        <option value="5">Lantai 5</option>
                        <option value="6">Lantai 6</option>
                        <option value="7">Lantai 7</option>
                        <option value="8">Lantai 8</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="acara-jam-mulai">Jam Mulai</label>
                    <input type="time" id="acara-jam-mulai" placeholder="Input jam mulai acara.."
                           class="px-6 py-2 rounded-lg border border-primary-color" required>
                </div>
            </div>
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <label for="acara-tanggal">Pilih Tanggal</label>
                    <input id="acara-tanggal" type="date" class="pr-16 pl-3 py-2 rounded-lg border border-primary-color"
                           required>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="acara-jam-selesai">Jam Selesai</label>
                    <input type="time" id="acara-jam-selesai" placeholder="Input jam berakhir acara.."
                           class="px-6 py-2 rounded-lg border border-primary-color" required>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <input id="acara-urgent" type="checkbox" class="w-4 h-4" required>
                <label for="acara-urgent">Urgent</label>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="acara-keterangan">Keterangan</label>
            <textarea name="keterangan" id="acara-keterangan" rows="5" placeholder="Keterangan Acara..."
                      class="p-2 rounded-lg border border-primary-color" required></textarea>
        </div>
        <div class="flex flex-col gap-2">
            <label for="acara-surat">Upload Tanda Pengenal</label>
            <input type="file" id="acara-surat" class="px-5 py-2 rounded-lg border border-primary-color" required>
        </div>
        <div id="acara-bukti-urgent-container" class="flex flex-col gap-2">
            <label for="acara-bukti-urgent">Upload Surat Bukti Urgent</label>
            <input type="file" id="acara-bukti-urgent" class="px-5 py-2 rounded-lg border border-primary-color"
                   required>
        </div>
        <div id="buttons" class="flex justify-around">
            <a class="py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer">Kembali</a>
            <button class="py-2 px-8 bg-third-color text-neutral-color rounded-3xl cursor-pointer"
                    type="submit">Lanjut
            </button>
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let checkbox = document.getElementById("acara-urgent");
        let uploadSection = document.getElementById("acara-bukti-urgent-container");

        checkbox.addEventListener("change", () => {
            uploadSection.style.display = checkbox.checked ? "flex" : "none";
        });

        uploadSection.style.display = checkbox.checked ? "flex" : "none";
    });
</script>