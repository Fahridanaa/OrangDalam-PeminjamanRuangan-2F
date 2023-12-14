<div class="flex-auto flex flex-col justify-center items-center mb-32">
    <div class="border flex flex-col p-12 border-black rounded-3xl gap-12 shadow-[0_4px_4px_0px_#00000025]">
        <div class="flex flex-col gap-4">
            <h1 class="text-center font-bold text-2xl">Booking Anda Berhasil</h1>
            <span class="text-center"><?php
                if ($_GET['category'] == 'acara') {
                    if ($_SESSION['formPinjam']['urgent']) {
                        echo 'Silahkan tunggu konfirmasi dari Admin';
                    } else {
                        echo 'Silahkan uploads surat peminjaman untuk <br> tahap selanjutnya';
                    }
                } else {
                    if ($_SESSION['level'] === 'mahasiswa') {
                        echo 'Silahkan tunggu konfirmasi dari Ketua Kelas';
                    } else {
                        echo 'Silahkan tunggu konfirmasi dari Dosen';
                    }
                }
                ?></span>

        </div>
        <div class="flex justify-center">
            <a class="text-center text-neutral-color bg-third-color px-16 py-2 rounded-3xl" href="">Selesai</a>
        </div>
    </div>
