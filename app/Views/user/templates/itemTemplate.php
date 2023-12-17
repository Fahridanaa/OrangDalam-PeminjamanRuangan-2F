<div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
    <div class="flex w-full justify-between">
        <div class="flex gap-4">
            <span class="text-neutral-color px-3 py-1 <?= $color ?> rounded-xl"><?= $item['status']; ?></span>
            <!--                        tambahi category-->
            <span class="acara text-neutral-color px-3 py-1 bg-locked-color rounded-xl">Acara</span>
        </div>
        <?= $notif ?>
    </div>
    <div class="flex flex-col gap-1">
        <span class="font-bold text-3xl"><?= $item['kode_ruang']; ?></span>
        <span class="font-normal text-xl">Digunakan Tanggal <?= $item['tanggalAcara'] ?></span>
    </div>
    <div class="self-end flex gap-5">
        <?= $buttonSurat ?>
        <!--                      iki class e diganti antara matkul sama acara-->
        <button data-id="<?= $id ?>"
                class="detail-acara-button ont-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
            Detail Peminjaman
        </button>
    </div>
</div>