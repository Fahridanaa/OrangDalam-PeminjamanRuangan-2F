<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body>
<div id="Konfirmasi" class="h-screen flex flex-row">
    <?php
    include 'sidebar.php';
    use OrangDalam\PeminjamanRuangan\Controllers\User\RequestController;
    $req = new RequestController();
    ?>
    <div id="Konfirmasi-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12 ml-32">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Konfirmasi Ruangan Mata Kuliah</h1>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <?php
            if ($_SESSION['level'] == 'Dosen') {
                $data = $req->getRequest($_SESSION['user']['nidn']);
            }

            if ($data == null) {
                echo '<span class="text-xl font-medium">Belum ada Permintaan</span>';
            }
            else {
                foreach ($data as $item) {
                    $btn = '';
                    $color = '';
                    if ($item['status'] == 'Perlu Konfirmasi') {
                        $color = 'warn';
                        $btn = '<div class="items-center flex gap-5">
                                    <button id="cek" data-id="' . $item['id'] . '" class="tolak-konfirmasi-matkul-button font-bold text-sm px-6 py-2 bg-danger-color rounded-3xl text-[#ffffff] hover:bg-[#A52F15]">Tolak Perubahan</button>
                                    <button type="submit" name="btn-confirm" id="btn-confirm" data-id="' . $item['id'] . '" class="font-bold text-sm px-10 py-2 bg-select-color rounded-3xl text-neutral-color hover:bg-[#27BD63]">Konfirmasi</button>
                                </div>';
                    }
                    elseif ($item['status'] == 'Terkonfirmasi') {
                        $color = 'select';
                    }
                    elseif ($item['status'] == 'Dibatalkan') {
                        $color = 'danger';
                    }

                    echo '<div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                        <div class="flex w-full justify-between">
                            <span class="text-neutral-color px-3 py-1 bg-' . $color . '-color rounded-xl">'. $item['status'] . '</span>
                        </div>
                        <div class="flex w-full justify-between">
                        <div class="flex flex-col gap-1">
                            <span class="font-bold text-3xl">' . $item['matkul'] . '</span>
                            <span class="font-normal text-xl">' . $item['ruang'] . '</span>
                        </div>'
                        . $btn .
                      '</div>
                            <div class="self-end flex gap-5">
                                <button class="text-xl flex items-center gap-3">
                                    <span class="detail-matkul-button">Detail Informasi</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                    </svg>
                                </button>
                            </div>
                      </div>';
                    }
                }
            ?>
        </div>
    </div>
    <?php include __DIR__ . '/modals/detailMataKuliah.php'; ?>
    <?php include __DIR__ . '/modals/tolakPindahMataKuliah.php'; ?>
    <?php if (isset($_POST['keterangan'])) {
        include __DIR__ . '/modals/TawaranPermintaanPemindahanMataKuliah.php';
    } ?>
</div>
<script>
    const modals = document.querySelectorAll('.modal');
    const detailMatkulButton = document.querySelectorAll('.detail-matkul-button');
    const tolakButton = document.querySelectorAll('.tolak-konfirmasi-matkul-button');

    detailMatkulButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[0].classList.remove('hidden');
        })
    })

    tolakButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[1].classList.remove('hidden');
            const idx = event.currentTarget.getAttribute('data-id');
            document.getElementById('index').value = idx;
        })
    })

    modals.forEach((modal) => {
        const overlay = modal.querySelector('.overlay');
        const closeModal = modal.querySelector('.close-modal');

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        })

        overlay.addEventListener('click', () => {
            modal.classList.add('hidden');
        })
    })

    document.getElementById('btn-confirm').addEventListener('click', function () {
        var id = this.getAttribute('data-id');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log('Status berhasil diperbarui');
                    // Me-refresh halaman setelah pembaruan status
                    location.reload(true); // Parameter true untuk me-reload dari server, bukan dari cache
                } else {
                    console.error('Gagal memperbarui status');
                }
            }
        };
        xhr.open('POST', '/konfirmasi-ruangan');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var data = 'status=Terkonfirmasi&index=' + id;
        xhr.send(data);
    });
</script>
</body>
</html>
