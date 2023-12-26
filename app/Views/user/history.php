<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php';

    use OrangDalam\PeminjamanRuangan\Controllers\User\HistoryController;

    ?>
</head>
<body>
<div id="History" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="History-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12 ml-32">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Riwayat Peminjaman</h1>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <?php

            function displayItem($item)
            {
                $status = $item['status'];
                $color = '';
                $id = $item['id'];

                switch ($status) {
                    case 'Peminjaman Gagal':
                        $color = 'bg-danger-color';
                        break;
                    case 'Peminjaman Berhasil':
                        $color = 'bg-select-color';
                        break;
                }

                include __DIR__ . '/templates/itemTemplate.php';
            }

            function getUserHistory($nomor): ?array
            {
                $data = new HistoryController();
                try {
                    return $data->showHistory($nomor);
                } catch (Exception $e) {
                    error_log($e);
                    return null;
                }
            }

            if ($_SESSION['level'] == 'Mahasiswa') {
                $listHistory = getUserHistory($_SESSION['user']['nim']);
            }
            elseif ($_SESSION['level'] == 'Dosen') {
                $listHistory = getUserHistory($_SESSION['user']['nidn']);
            }

            if ($listHistory == null) {
                echo '<span class="text-3xl font-semibold text-center">Belum ada Riwayat Peminjaman</span>';
            } else {
                foreach ($listHistory as $item) :
                    displayItem($item);
                endforeach;
            }
            ?>
        </div>
    </div>
    <?php include __DIR__ . '/modals/detailPeminjamanAcara.php'; ?>
    <?php include __DIR__ . '/modals/detailMataKuliah.php'; ?>
</div>
<script>
    const modals = document.querySelectorAll('.modal');
    const detailAcaraButton = document.querySelectorAll('.detail-acara-button');
    const detailMatkulButton = document.querySelectorAll('.detail-matkul-button');


    detailAcaraButton.forEach((button) => {
        button.addEventListener('click', (e) => {
            let detailAcara = document.getElementById('detailAcara');
            e.preventDefault();
            const id = button.getAttribute('data-id');
            modals[0].classList.remove('hidden');
            setTimeout(() => {
                detailAcara.style.transform = 'translateY(0)';
                detailAcara.style.opacity = '1';
            }, 50)
            fetch('/riwayat/data?id=' + id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('lantai-span').textContent = data.lantai;
                    document.getElementById('ruang-span').textContent = data.ruang;
                    document.getElementById('keterangan-span').textContent = data.keterangan;
                    document.getElementById('tanggalAcara-span').textContent = data.tanggalAcara;
                    document.getElementById('mulai-span').textContent = data.mulai;
                    document.getElementById('selesai-span').textContent = data.selesai;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        })
    })

    detailMatkulButton.forEach((button) => {
        button.addEventListener('click', (e) => {
            modals[1].classList.remove('hidden');
        });
    });

    function hideModal(modal, detailAcara) {
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 150)
        detailAcara.style.transform = '';
        detailAcara.style.opacity = '';
    }

    modals.forEach((modal) => {
        const overlay = modal.querySelector('.overlay');
        const closeModal = modal.querySelector('.close-modal');

        closeModal.addEventListener('click', () => {
            hideModal(modal, document.getElementById('detailAcara'))
        })

        overlay.addEventListener('click', () => {
            hideModal(modal, document.getElementById('detailAcara'))
        })
    })
</script>
</body>
</html>