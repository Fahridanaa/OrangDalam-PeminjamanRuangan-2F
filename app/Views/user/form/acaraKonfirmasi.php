<div class="flex-auto self-stretch flex flex-col justify-between">
    <div class="flex flex-col px-24 py-12 mx-auto mb-12 border border-black rounded-xl shadow-[0_4px_4px_0px_#00000025]">
        <form action="/pinjam/form?step=4" method="POST">
            <?php include __DIR__ . '/../detailAcara.php'; ?>
            <div id="buttons" class="flex justify-around mt-10">
                <a class="py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer"
                   href="javascript:history.back()">Kembali</a>
                <button class="py-2 px-8 bg-third-color text-neutral-color rounded-3xl cursor-pointer"
                        type="submit">Lanjut
                </button>
            </div>
        </form>
    </div>
</div>