<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../../public/css/output.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../icon/favicon.ico" />
    <style>
        #option select {
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
        }

        #option select::-ms-expand {
            display: none;
        }

        /* input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        } */
    </style>
</head>

<?php
// Data peminjaman untuk mahasiswa
$peminjamanMahasiswa = array(
    array("Fahridana Ahmad", "Teknologi Informasi", "LIG 1, LSI 1", "Dipinjam Untuk Kegiatan Event Hacktober WRI", "20 November 2023", "10 Desember 2023"),
    // Tambahkan data mahasiswa lain jika ada
);
// Data peminjaman untuk Dosen
$peminjamanDosen = array(
    array("Mungki Astiningrum", "Teknologi Informasi", "LIG 3", "Dipinjam Untuk Sempro", "20 November 2023", "06 Desember 2023"),
    // Tambahkan data Dosen lain jika ada
);
// Menggabungkan data mahasiswa dan dosen menjadi satu array
$peminjamanSemua = array_merge($peminjamanMahasiswa, $peminjamanDosen);
?>

<body class="overflow-hidden font-jakarta" style="background: #edf2f7;">
    <div class="flex flex-row">
        <?php include 'sidebar.php'; ?>
        <div class="min-h-screen">
            <section class="flex flex-col items-stretch mt-4">
                <div class="flex pb-1 mx-8 mt-10 mb-2 flex-nowrap">
                    <h4 class="pl-2 text-3xl font-bold font-jakarta">
                        Riwayat Peminjaman
                    </h4>
                </div>
                <div class="mx-8 mb-4 border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="semua-tab" data-tabs-target="#semua" type="button" role="tab" aria-controls="semua" aria-selected="false">
                                Semua
                            </button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="mahasiswa-tab" data-tabs-target="#mahasiswa" type="button" role="tab" aria-controls="mahasiswa" aria-selected="false">
                                Mahasiswa
                            </button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dosen-tab" data-tabs-target="#dosen" type="button" role="tab" aria-controls="dosen" aria-selected="false">
                                Dosen
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content" class="px-10" >
                    <div class="tab-content" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                        <table class="w-full text-base rtl:text-right font-jakarta">
                            <thead class="text-white bg-gray-600">
                                <tr>
                                    <th scope="col" class="px-1 py-3">Peminjam</th>
                                    <th scope="col" class="px-6 py-3">Jurusan</th>
                                    <th scope="col" class="px-6 py-3">Ruangan</th>
                                    <th scope="col" class="px-6 py-3">Keterangan</th>
                                    <th scope="col" class="px-2 py-3">Tanggal Pinjam</th>
                                    <th scope="col" class="px-2 py-3">Tanggal Acara</th>
                                    <th scope="col" class="px-1 py-3">Surat Peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Loop melalui data peminjaman semua
                                foreach ($peminjamanSemua as $data) {
                                    echo "<tr>";
                                    foreach ($data as $value) {
                                        echo "<td class=\"px-6 py-4\">$value</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-content" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab">
                        <table class="w-full text-base rtl:text-right font-jakarta">
                            <thead class="text-white bg-gray-600">
                                <tr>
                                    <th scope="col" class="px-1 py-3">Peminjam</th>
                                    <th scope="col" class="px-6 py-3">Jurusan</th>
                                    <th scope="col" class="px-6 py-3">Ruangan</th>
                                    <th scope="col" class="px-6 py-3">Keterangan</th>
                                    <th scope="col" class="px-2 py-3">Tanggal Pinjam</th>
                                    <th scope="col" class="px-2 py-3">Tanggal Acara</th>
                                    <th scope="col" class="px-1 py-3">Surat Peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Loop melalui data peminjaman mahasiswa
                                foreach ($peminjamanMahasiswa as $data) {
                                    echo "<tr>";
                                    foreach ($data as $value) {
                                        echo "<td class=\"px-6 py-4\">$value</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-content" id="dosen" role="tabpanel" aria-labelledby="dosen-tab">
                        <table class="w-full text-base rtl:text-right font-jakarta">
                            <thead class="text-white bg-gray-600">
                                <tr>
                                    <th scope="col" class="px-1 py-3">Peminjam</th>
                                    <th scope="col" class="px-6 py-3">Jurusan</th>
                                    <th scope="col" class="px-6 py-3">Ruangan</th>
                                    <th scope="col" class="px-6 py-3">Keterangan</th>
                                    <th scope="col" class="px-2 py-3">Tanggal Pinjam</th>
                                    <th scope="col" class="px-2 py-3">Tanggal Acara</th>
                                    <th scope="col" class="px-1 py-3">Surat Peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Loop melalui data peminjaman Dosen
                                foreach ($peminjamanDosen as $data) {
                                    echo "<tr>";
                                    foreach ($data as $value) {
                                        echo "<td class=\"px-6 py-4\">$value</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tambahkan event listener untuk setiap tombol tab
            document.querySelectorAll("[data-tabs-target]").forEach(function(button) {
                button.addEventListener("click", function() {
                    // Hilangkan kelas 'active-tab' dari semua tombol tab
                    document.querySelectorAll("[data-tabs-target]").forEach(function(tabButton) {
                        tabButton.classList.remove("active-tab");
                    });

                    // Tambahkan kelas 'active-tab' pada tombol yang diklik
                    button.classList.add("active-tab");

                    // Sembunyikan semua konten tab
                    document.querySelectorAll(".tab-content").forEach(function(tabContent) {
                        tabContent.style.display = "none";
                    });

                    // Tampilkan konten tab yang sesuai dengan tombol yang diklik
                    var targetId = button.getAttribute("data-tabs-target");
                    var targetTab = document.getElementById(targetId);
                    if (targetTab) {
                        targetTab.style.display = "block";
                    }
                });
            });
        });
    </script>
</body>

</html>