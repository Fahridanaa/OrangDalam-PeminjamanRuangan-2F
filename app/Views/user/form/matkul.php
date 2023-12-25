<?php

use OrangDalam\PeminjamanRuangan\Controllers\User\RequestController;

$request = new RequestController();
?>
<div class="border mx-auto px-24 py-8 flex flex-col justify-between border-black rounded-3xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
    <h1 class="text-center font-semibold text-2xl">Pindah Jam Mata Kuliah</h1>
    <form id="booking-form" action="/pinjam/form?step=2" class="flex flex-col gap-6" method="POST"
          enctype="multipart/form-data">
        <div id="input-form" class="flex flex-col gap-2">
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <label for="lantai">Pilih Lantai</label>
                    <select name="lantai" id="lantai"
                            class="pr-16 pl-8 py-3 rounded-lg border border-primary-color"
                            title="Lantai" required>
                        <option selected disabled hidden>Lantai Ruangan</option>
                        <option value="Lantai 5">Lantai 5</option>
                        <option value="Lantai 6">Lantai 6</option>
                        <option value="Lantai 7">Lantai 7</option>
                        <option value="Lantai 8">Lantai 8</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="tanggal-matkul">Pilih Tanggal</label>
                    <input name="tanggal-matkul" id="tanggal-matkul" type="date"
                           class="pr-16 pl-8 py-2 rounded-lg border border-primary-color" required>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="matkul">Mata Kuliah</label>
                <select name="matkul" id="matkul"
                        class="pr-16 pl-8 py-3 rounded-lg border border-primary-color" required>
                    <option selected disabled hidden>Nama Mata Kuliah</option>
                    <?php
                    foreach ($request->getMatkul() as $item) {
                        echo '<option value="' . $item['kode'] . '">' . $item['nama'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label for="dosen-pengampu">Dosen</label>
                <select name="dosen-pengampu" id="dosen-pengampu"
                        class="pr-24 pl-8 py-3 rounded-lg border border-primary-color" required>
                    <option selected disabled hidden>Nama Dosen</option>
                    <?php
                    foreach ($request->getDosen() as $item) {
                        echo '<option value="' . $item['nidn'] . '">' . $item['nama'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="flex gap-24">
                <div class="flex flex-col gap-2">
                    <label for="jam-mulai-matkul">Jam Mulai</label>
                    <select name="jam-mulai-matkul" id="jam-mulai-matkul"
                            class="pr-24 pl-8 py-3 rounded-lg border border-primary-color" required>
                        <option selected disabled hidden>Pilihan Jam</option>
                        <?php
                        foreach ($request->getjp() as $item) {
                            echo '<option value="' . $item['kode'] . '">Jam ke-' . $item['kode'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="jam-selesai-matkul">Jam Selesai</label>
                    <select name="jam-selesai-matkul" id="jam-selesai-matkul"
                            class="pr-24 pl-8 py-3 rounded-lg border border-primary-color" required>
                        <option selected disabled hidden>Pilihan Jam</option>
                        <?php
                        foreach ($request->getjp() as $item) {
                            echo '<option value="' . $item['kode'] . '">Jam ke-' . $item['kode'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="matkul-keterangan">Keterangan</label>
            <textarea name="matkul-keterangan" id="matkul-keterangan" rows="5" placeholder="Keterangan Acara..."
                      class="p-2 rounded-lg border border-primary-color" required></textarea>
        </div>
        <div class="flex flex-col gap-2">
            <label for="tanda-pengenal">Upload Tanda Pengenal</label>
            <input type="file" name="tanda-pengenal" id="tanda-pengenal"
                   class="px-5 py-2 rounded-lg border border-primary-color" required>
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