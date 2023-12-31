<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body>
<div id="Konfirmasi" class="flex flex-row h-screen">
    <?php
    include 'sidebar.php';
    use OrangDalam\PeminjamanRuangan\Controllers\User\RequestController;
    $req = new RequestController();
    ?>
    <div id="Konfirmasi-content" class="flex flex-col w-screen h-screen gap-12 px-8 py-20 ml-32">
        <div id="header">
            <h1 class="mb-6 text-4xl font-semibold">Konfirmasi Ruangan Mata Kuliah</h1>
            <hr class="border border-black">
        </div>
        <div class="flex flex-col flex-auto gap-3 overflow-y-auto">
            <?php
            if ($_SESSION['level'] == 'Dosen') {
                $data = $_SESSION['user']['nidn'];
            }
            else {
                $data = $_SESSION['user']['nim'];
            }

            $dataReq = $req->getRequest($data);

            if ($dataReq == null) {
                echo '<span class="text-xl font-medium">Belum ada Permintaan</span>';
            }
            else {
                foreach ($dataReq as $item) {
                    $btn = '';
                    $color = '';
                    if ($item['status'] == 'Perlu Konfirmasi') {
                        $color = 'warn';
                        if ($item['menerima'] == $data) {
                            $btn = '<div class="flex items-center gap-5">
                                    <button id="cek" data-id="' . $item['id'] . '" class="tolak-konfirmasi-matkul-button font-bold text-sm px-6 py-2 bg-danger-color rounded-3xl text-[#ffffff] hover:bg-[#A52F15]">Tolak Perubahan</button>
                                    <button type="submit" name="btn-confirm" id="btn-confirm" data-id="' . $item['id'] . '" class="btn-confirm-class font-bold text-sm px-10 py-2 bg-select-color rounded-3xl text-neutral-color hover:bg-[#27BD63]">Konfirmasi</button>
                                </div>';
                        }
                    }
                    elseif ($item['status'] == 'Terkonfirmasi' || $item['status'] == 'Selesai') {
                        $color = 'select';
                        if ($item['status'] == 'Terkonfirmasi') {
                            $btn = '<div class="flex items-center gap-5">
                                   <button type="submit" name="btn-selesai" id="btn-selesai" data-id="' . $item['id'] . '" class="btn-selesai-class font-bold text-sm px-10 py-2 bg-select-color rounded-3xl text-neutral-color hover:bg-[#27BD63]">Selesai</button>
                               </div>';
                        }
                    }
                    elseif ($item['status'] == 'Dibatalkan') {
                        $color = 'danger';
                    }

                    echo '<div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                        <div class="flex justify-between w-full">
                            <span class="px-3 py-1 text-neutral-color bg-' . $color . '-color rounded-xl">'. $item['status'] . '</span>
                        </div>
                        <div class="flex justify-between w-full">
                        <div class="flex flex-col gap-1">
                            <span class="text-3xl font-bold">' . $item['matkul'] . '</span>
                            <span class="text-xl font-normal">' . $item['ruang'] . '</span>
                        </div>'
                        . $btn .
                      '</div>
                            <div class="self-end flex gap-5">
                                <button class="detail-matkul-button text-xl flex items-center gap-3" data-id=' . $item['id'] .'>
                                    <span>Detail Informasi</span>
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
        button.addEventListener('click', (e) => {
            e.preventDefault();
            let detailAcara = document.getElementById('detailMatkul');
            const id = button.getAttribute('data-id');
            modals[0].classList.remove('hidden');
            setTimeout(() => {
                detailAcara.style.transform = 'translateY(0)';
                detailAcara.style.opacity = '1';
            }, 50)
            $kelasMatkul = document.getElementById('kelas-matkul');
            $dosenMatkul = document.getElementById('dosen-matkul');
            fetch('/konfirmasi-ruangan/data?id=' + id)
                .then(response => response.json())
                .then(item => {
                    const data = item[0];
                    document.getElementById('lantai-matkul').textContent = data.lantai;
                    document.getElementById('ruang-matkul').textContent = data.ruang;
                    document.getElementById('keterangan-matkul').textContent = data.keterangan;
                    document.getElementById('tanggal-matkul').textContent = data.tanggal;
                    document.getElementById('matkul').textContent = data.matkul;
                    if($kelasMatkul != null) {
                        $kelasMatkul.textContent = data.kelas;
                    }
                    if($dosenMatkul != null) {
                        $dosenMatkul.textContent = data.dosen;
                    }
                    document.getElementById('mulai-matkul').textContent = data.mulai;
                    document.getElementById('selesai-matkul').textContent = data.selesai;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    })

    tolakButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[1].classList.remove('hidden');
            const idx = event.currentTarget.getAttribute('data-id');
            document.getElementById('index').value = idx;
        })
    })

    function hideModal(modal) {
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 150)
        modal.children[1].children[0].style.transform = '';
        modal.children[1].children[0].style.opacity = '';
    }

    modals.forEach((modal) => {
        const overlay = modal.querySelector('.overlay');
        const closeModal = modal.querySelector('.close-modal');

        closeModal.addEventListener('click', () => {
            hideModal(modal);
        })

        overlay.addEventListener('click', () => {
            hideModal(modal);
        })
    })

    function updateStatus(status, id) {
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
        var data = 'status=' + status + '&index=' + id;
        xhr.send(data);
    }
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('btn-selesai-class')) {
            var id = event.target.getAttribute('data-id');
            updateStatus('Selesai', id);
        }

        if (event.target.classList.contains('btn-confirm-class')) {
            var id = event.target.getAttribute('data-id');
            updateStatus('Terkonfirmasi', id);
        }
    });
</script>
</body>
</html>
