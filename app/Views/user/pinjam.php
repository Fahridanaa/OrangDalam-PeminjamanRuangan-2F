<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body class="h-screen overflow-hidden">
<div id="Peminjaman" class="h-screen flex flex-row">
    <?php
    include 'sidebar.php';

    use \OrangDalam\PeminjamanRuangan\Controllers\User\PinjamController;
    use \config\Database;

    ?>
    <div id="Peminjaman-content" class="h-screen w-screen px-8 py-20 flex flex-col gap-12 ml-32">
        <div id="header">
            <div id="head" class="flex justify-between mb-6">
                <h1 class="text-4xl font-semibold">Pinjam Ruangan</h1>
                <a class="bg-third-color rounded-full px-10 text-neutral-color align-middle flex items-center cursor-pointer hover:bg-primary-color"
                   href="/pinjam/form?step=1">
                    <span>Pinjam</span>
                </a>
            </div>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <?php
            function displayItem($item)
            {
                $status = htmlspecialchars($item['status'], ENT_QUOTES, 'UTF-8');
                $color = '';
                $notif = '';
                $buttonSurat = '';
                $deadline = $item['deadline'];
                $id = $item['id'];
                switch ($status) {
                    case 'Menunggu Konfirmasi':
                        $color = 'bg-warn-color';
                        break;
                    case 'Diperlukan Surat Izin':
                        $color = 'bg-danger-color';
                        $notif = '<span class="text-danger-color text-lg font-semibold">*Upload Surat Sebelum ' . htmlentities($deadline) . '</span>';
                        $buttonSurat = '<button class="uploads-surat-izin-button font-bold text-sm px-3 py-2 bg-select-color rounded-3xl text-[#ffffff] hover:bg-[#27BD63]">Upload Surat Izin</button>';
                        break;
                    case 'Telah Dikonfirmasi':
                        $color = 'bg-select-color';
                        break;
                }
                include __DIR__ . '/templates/itemTemplate.php';
            }

            function getUserPeminjaman($nim): ?array
            {
                $pinjamController = new PinjamController();
                try {
                    return $pinjamController->showPinjam($nim);
                } catch (Exception $e) {
                    error_log($e);
                    return null;
                }
            }

            if (isset($_SESSION['user']['nim'])) {
                $listPinjam = getUserPeminjaman($_SESSION['user']['nim']);
            }
            if ($listPinjam == null) {
                echo '<span class="text-xl font-medium">Belum ada Peminjaman</span>';
            } else {
                foreach ($listPinjam as $item) :
                    displayItem($item);
                endforeach;
            } ?>
        </div>
    </div>
    <?php include __DIR__ . '/../user/modals/uploadSurat.php'; ?>
    <?php include __DIR__ . '/../user/modals/detailPeminjamanAcara.php'; ?>
    <?php include __DIR__ . '/../user/modals/detailMataKuliah.php'; ?>
</div>
<script>
    const modals = document.querySelectorAll('.modal');
    const uploadSuratButton = document.querySelectorAll('.uploads-surat-izin-button');
    const detailAcaraButton = document.querySelectorAll('.detail-acara-button');
    const detailMatkulButton = document.querySelectorAll('.detail-matkul-button');

    uploadSuratButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[0].classList.remove('hidden');
        })
    })

    detailAcaraButton.forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const id = button.getAttribute('data-id');
            modals[1].classList.remove('hidden');
            fetch('/pinjam/data?id=' + id)
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
        });
    });


    detailMatkulButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[2].classList.remove('hidden');
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
</script>
</body>

</html>
