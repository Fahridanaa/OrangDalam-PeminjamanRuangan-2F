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
    array("Fahridana Ahmad", "Teknologi Informasi", "LIG 1, LSI 1", "Dipinjam Untuk Kegiatan Event Hacktober WRI", "20 November 2023", "10 Desember 2023","[File Surat Peminjaman]"),
    // Tambahkan data mahasiswa lain jika ada
);
// Data peminjaman untuk Dosen
$peminjamanDosen = array(
    array("Mungki Astiningrum", "Teknologi Informasi", "LIG 3", "Dipinjam Untuk Sempro", "20 November 2023", "06 Desember 2023","[File Surat Peminjaman]"),
    // Tambahkan data Dosen lain jika ada
);
// Menggabungkan data mahasiswa dan dosen menjadi satu array
$peminjamanSemua = array_merge($peminjamanMahasiswa, $peminjamanDosen);

// Menentukan tab yang aktif
$tabSemua = isset($_GET['tab']) && $_GET['tab'] === 'semua';
$tabMahasiswa = isset($_GET['tab']) && $_GET['tab'] === 'mahasiswa';
$tabDosen = isset($_GET['tab']) && $_GET['tab'] === 'dosen';

// Jika tidak ada parameter tab, maka tab "Semua" yang aktif
if (!isset($_GET['tab'])) {
    $tabSemua = true;
}
?>

<body class="overflow-hidden font-jakarta">
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
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" role="tablist">
                        <li class="me-2" role="presentation">
                            <a class="inline-block p-4 border-b-2 rounded-t-lg <?php echo $tabSemua ? 'active-tab' : ''; ?>" href="?tab=semua" role="tab" aria-controls="semua" aria-selected="false">
                                Semua
                            </a>
                        </li>
                        <li class="me-2" role="presentation">
                            <a class="inline-block p-4 border-b-2 rounded-t-lg <?php echo $tabMahasiswa ? 'active-tab' : ''; ?>" href="?tab=mahasiswa" role="tab" aria-controls="mahasiswa" aria-selected="false">
                                Mahasiswa
                            </a>
                        </li>
                        <li class="me-2" role="presentation">
                            <a class="inline-block p-4 border-b-2 rounded-t-lg <?php echo $tabDosen ? 'active-tab' : ''; ?>" href="?tab=dosen" role="tab" aria-controls="dosen" aria-selected="false">
                                Dosen
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content" class="px-10">
                    <div class="tab-content" id="semua" role="tabpanel" aria-labelledby="semua-tab" style="display: <?php echo $tabSemua ? 'block' : 'none'; ?>">
                        <table class="w-full text-base rtl:text-right font-jakarta">
                            <!-- Isikan kode untuk menampilkan semua riwayat data peminjaman -->
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
                    <div class="tab-content" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab" style="display: <?php echo $tabMahasiswa ? 'block' : 'none'; ?>">
                        <table class="w-full text-base rtl:text-right font-jakarta">
                            <!-- Isikan kode untuk menampilkan data mahasiswa -->
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
                    <div class="tab-content" id="dosen" role="tabpanel" aria-labelledby="dosen-tab" style="display: <?php echo $tabDosen ? 'block' : 'none'; ?>">
                        <table class="w-full text-base rtl:text-right font-jakarta">
                            <!-- Isikan kode untuk menampilkan data dosen -->
                            <thead class="text-white bg-gray-600">
                                <tr>
                                    <th scope="col" class="px-1 py-3">Peminjam</th>
                                    <th scope="col" class="px-6 py-3">Jurusan</th>
                                    <th scope="col" class="px-6 py-3">Ruangan</th>
                                    <th scope="col" class="px-8 py-3">Keterangan</th>
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
                                        echo "<td class=\"px-6 py-6\">$value</td>";
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
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tambahkan event listener untuk setiap tombol tab
            document.querySelectorAll("[data-tabs-target]").forEach(function(button) {
                button.addEventListener("click", function() {
                    // Hapus kelas 'active-tab' dari semua tombol tab
                    document.querySelectorAll("[data-tabs-target]").forEach(function(tabButton) {
                        tabButton.classList.remove("active-tab");
                    });

                    // Hapus kelas 'active-tab' dari semua konten tab
                    document.querySelectorAll(".tab-content").forEach(function(tabContent) {
                        tabContent.style.display = "none";
                    });

                    // Tambahkan kelas 'active-tab' pada tombol yang diklik
                    button.classList.add("active-tab");

                    // Tampilkan konten tab yang sesuai dengan tombol yang diklik
                    var targetId = button.getAttribute("data-tabs-target");
                    var targetTab = document.getElementById(targetId);
                    if (targetTab) {
                        targetTab.style.display = "table";
                    }
                });
            });
        });
    </script> -->

</body>

</html>