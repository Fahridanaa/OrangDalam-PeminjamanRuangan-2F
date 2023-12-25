<div class="border mx-auto px-24 py-8 flex flex-col justify-between border-black rounded-3xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
    <h1 class="text-center font-semibold text-2xl">Booking Ruangan Acara</h1>
    <form action="/pinjam/form?step=2" id="booking-form" class="flex flex-col gap-6" method="POST"
          enctype="multipart/form-data">
        <div id="input-form" class="flex flex-col gap-2">
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <label for="lantai">Pilih Lantai</label>
                    <select name="lantai" id="lantai"
                            class="pr-16 pl-3 py-3 rounded-lg border border-primary-color"
                            title="Lantai" required>
                        <option selected disabled hidden>Lantai Ruangan</option>
                        <option value="Lantai 5">Lantai 5</option>
                        <option value="lantai 6">Lantai 6</option>
                        <option value="Lantai 7">Lantai 7</option>
                        <option value="Lantai 8">Lantai 8</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="acara-jam-mulai">Jam Mulai</label>
                    <input type="time" id="acara-jam-mulai" name="acara-jam-mulai" placeholder="Input jam mulai acara.."
                           class="px-6 py-2 rounded-lg border border-primary-color" required>
                </div>
            </div>
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <label for="acara-tanggal">Pilih Tanggal</label>
                    <input id="acara-tanggal" name="acara-tanggal" type="date"
                           class="pr-16 pl-3 py-2 rounded-lg border border-primary-color"
                           required>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="acara-jam-selesai">Jam Selesai</label>
                    <input type="time" id="acara-jam-selesai" name="acara-jam-selesai"
                           placeholder="Input jam berakhir acara.."
                           class="px-6 py-2 rounded-lg border border-primary-color" required>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <input id="acara-urgent" name="acara-urgent" type="checkbox" class="w-4 h-4" value="true">
                <label for="acara-urgent">Urgent</label>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="acara-keterangan">Keterangan</label>
            <textarea name="acara-keterangan" id="acara-keterangan" rows="5" placeholder="Keterangan Acara..."
                      class="p-2 rounded-lg border border-primary-color" required></textarea>
        </div>
        <div class="flex flex-col">
            <label for="tanda-pengenal" class="mb-2">Upload Tanda Pengenal</label>
            <input type="file" id="tanda-pengenal" name="tanda-pengenal"
                   class="px-5 py-2 rounded-lg border border-primary-color" required>
            <section class="flex justify-between">
                <span class="text-gray-400 text-sm">(png, jpg, jpeg)</span>
                <span class="text-danger-color text-sm">Maks 2MB</span>
            </section>
        </div>
        <div id="acara-bukti-urgent-container" class="flex flex-col">
            <label for="acara-bukti-urgent" class="mb-2">Upload Surat Bukti Urgent</label>
            <input type="file" id="acara-bukti-urgent" name="acara-bukti-urgent"
                   class="px-5 py-2 rounded-lg border border-primary-color">
            <section class="flex justify-between">
                <span class="text-gray-400 text-sm">(pdf)</span>
                <span class="text-danger-color text-sm">Maks 2MB</span>
            </section>
        </div>
        <div id="buttons" class="flex justify-around">
            <a class="py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer"
               href="/pinjam/form?step=1">Kembali</a>
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
        let input = document.getElementById("acara-bukti-urgent")

        checkbox.addEventListener("change", () => {
            uploadSection.style.display = checkbox.checked ? "flex" : "none";
            input.classList.toggle("required");
        });

        uploadSection.style.display = checkbox.checked ? "flex" : "none";
    });
</script>