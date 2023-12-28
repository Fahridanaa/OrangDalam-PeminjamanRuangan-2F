<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include __DIR__ . '/../shared/head.php';
    use OrangDalam\PeminjamanRuangan\Controllers\Admin\AdminKonfirmasiController;
    ?>
</head>

<body class="overflow-hidden font-jakarta">
<div class="flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div class="min-h-screen w-full">
        <section class="flex flex-col items-stretch mt-4">
            <div class="flex pb-3 mx-8 my-8 border-b-2 border-black flex-nowrap">
                <h4 class="pl-2 text-3xl font-bold font-jakarta">
                    Konfirmasi Peminjaman
                </h4>
            </div>

            <div id="default-tab-content">
                <div class="relative justify-center px-8 overflow-x-auto" id="semua" role="tabpanel"
                     aria-labelledby="semua-tab">
                    <table class="w-full text-base rtl:text-right font-jakarta">
                        <thead class="text-white bg-gray-600">
                        <tr>
                            <th scope="col" class="px-6 py-3">Peminjam</th>
                            <th scope="col" class="px-6 py-3">Ruangan</th>
                            <th scope="col" class="px-6 py-3">Tanggal Acara</th>
                            <th scope="col" class="px-6 py-3">No. Telp</th>
                            <th scope="col" class="px-6 py-3">Tanda Pengenal</th>
                            <th scope="col" class="px-6 py-3">Surat Peminjaman</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pinjam = new AdminKonfirmasiController();
                        $dataTable = $pinjam->konfirmasi();

                        foreach ($dataTable as $data) {
                            echo "<tr>";
                            for ($i = 0; $i < count($data) - 3; $i++) {
                                echo "<td class=\"px-6 py-4 text-center\">$data[$i]</td>";
                            }
                            echo '<td class="px-6 py-4 flex justify-center">';
                            $status = $pinjam->statusKonfirmasi($data[6]);
                            if ($status['status'] == 'Telah Dikonfirmasi') {
                                $tombolTerimaDitekan = true; // Ganti dengan kondisi sesuai kebutuhan
                            }
                            else {
                                $tombolTerimaDitekan = false; // Ganti dengan kondisi sesuai kebutuhan
                            }

                            // Cek apakah kolom [File Surat Peminjaman] memiliki value
                            $filePeminjaman = $data[7];
                            // $_SESSION['nim'] = null;
                            // $_SESSION['nidn'] = null; // Kolom [File Surat Peminjaman] berada pada indeks 5
                            // $_SESSION['data-id'] = $data[6];
                                
                            // Cek apakah request sudah disetujui (button Terima ditekan)
                            $requestDisetujui = $tombolTerimaDitekan; // Ganti dengan kondisi sesuai kebutuhan
                            if (!$requestDisetujui) {
                                // Jika request belum disetujui, tampilkan button Terima dan Tolak
                                if ($filePeminjaman == null) {
                                    // Jika [File Surat Peminjaman] kosong, tampilkan button Proses dan Tolak
                                    echo '<button type="button" class="focus:outline-none text-white bg-yellow-400 dark:bg-yellow-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" disabled>Proses</button>';
                                } else {
                                    // Jika [File Surat Peminjaman] terisi, tampilkan button Terima dan Tolak
                                    echo '<button type="submit" name="btn-terima" id="btn-terima" data-id="' . $data[6] .'" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Terima</button>';
                                }
                                echo '<button type="button" name="btn-tolak" id="btn-tolak" data-id="' . $data[6] .'" class="tolak-konfirmasi-pinjam-button focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Tolak</button>';
                            } else {
                                // Jika request sudah disetujui, tampilkan button Batalkan
                                
                                echo '<button type="button" name="btn-batal" id="btn-batal" data-id="' . $data[6] .'" class="batalkan-konfirmasi-pinjam-button focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batalkan</button>';
                            }
                            echo '</td>';
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <?php include __DIR__ . '/modals/pembatalanBooking.php'; ?>
        <?php include __DIR__ . '/modals/tolakPinjamanRuangan.php'; ?>
    </div>
</div>
<script>
    const modals = document.querySelectorAll('.modal');
    const tolakKonfirmasiButton = document.querySelectorAll('.tolak-konfirmasi-pinjam-button');
    const batalkanKonfirmasiButton = document.querySelectorAll('.batalkan-konfirmasi-pinjam-button');

    batalkanKonfirmasiButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[0].classList.remove('hidden');
            const id = event.currentTarget.getAttribute('data-id');

             // Setel nilai data-id ke dalam input tersembunyi pada formulir modal
            document.getElementById('index1').value = id;
        })
    })

    tolakKonfirmasiButton.forEach((button) => {
        button.addEventListener('click', () => {
            modals[1].classList.remove('hidden');
            // Ambil nilai data-id dari tombol yang diklik
            const id = event.currentTarget.getAttribute('data-id');

             // Setel nilai data-id ke dalam input tersembunyi pada formulir modal
            document.getElementById('index').value = id;
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

    document.getElementById('btn-terima').addEventListener('click', function () {
        var id = this.getAttribute('data-id');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
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

        xhr.open('POST', '/konfirmasiPinjam');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var data = 'status=Telah Dikonfirmasi&index=' + id;
        xhr.send(data);
    });
</script>
</body>

</html>