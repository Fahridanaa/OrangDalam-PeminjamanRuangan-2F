<div class="flex-auto flex flex-col justify-center items-center mb-32">
    <div class="border flex flex-col p-12 border-black rounded-3xl gap-12 shadow-[0_4px_4px_0px_#00000025]">
        <div class="flex flex-col gap-4">
            <h1 class="text-center font-bold text-2xl">Booking Anda Berhasil</h1>
            <span class="text-center"><?php
                echo $_SESSION['formPinjam']['done']
                ?></span>

        </div>
        <form action="/pinjam/form?step=5" method="POST" class="flex justify-center">
            <button class="text-center text-neutral-color bg-third-color px-16 py-2 rounded-3xl" href="">Selesai
            </button>
        </form>
    </div>
