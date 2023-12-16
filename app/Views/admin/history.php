<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>

<?php
// Data peminjaman untuk mahasiswa
$peminjamanMahasiswa = array(
    array("Fahridana Ahmad", "Teknologi Informasi", "LIG 1, LSI 1", "Dipinjam Untuk Kegiatan Event Hacktober WRI", "20 November 2023", "10 Desember 2023", "[File Surat Peminjaman]"),
    // Tambahkan data mahasiswa lain jika ada
);
// Data peminjaman untuk Dosen
$peminjamanDosen = array(
    array("Mungki Astiningrum", "Teknologi Informasi", "LIG 3", "Dipinjam Untuk Sempro", "20 November 2023", "06 Desember 2023", "[File Surat Peminjaman]"),
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
    <div class="min-h-screen w-full">
        <section class="flex flex-col items-stretch mt-4">
            <div class="flex pb-1 mx-8 mt-10 mb-2 flex-nowrap">
                <h4 class="pl-2 text-3xl font-bold font-jakarta">
                    Riwayat Peminjaman
                </h4>
            </div>
            <div class="mx-8 mb-4 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" role="tablist">
                    <li class="me-2" role="presentation">
                        <a class="inline-block p-4 border-b-2 rounded-t-lg <?php echo $tabSemua ? 'active-tab' : ''; ?>"
                           href="?tab=semua" role="tab" aria-controls="semua" aria-selected="false">
                            Semua
                        </a>
                    </li>
                    <li class="me-2" role="presentation">
                        <a class="inline-block p-4 border-b-2 rounded-t-lg <?php echo $tabMahasiswa ? 'active-tab' : ''; ?>"
                           href="?tab=mahasiswa" role="tab" aria-controls="mahasiswa" aria-selected="false">
                            Mahasiswa
                        </a>
                    </li>
                    <li class="me-2" role="presentation">
                        <a class="inline-block p-4 border-b-2 rounded-t-lg <?php echo $tabDosen ? 'active-tab' : ''; ?>"
                           href="?tab=dosen" role="tab" aria-controls="dosen" aria-selected="false">
                            Dosen
                        </a>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content" class="px-10">
                <div class="tab-content" id="semua" role="tabpanel" aria-labelledby="semua-tab"
                     style="display: <?php echo $tabSemua ? 'block' : 'none'; ?>">
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
                            foreach ($data as $key => $value) {
                                if ($key == 6) {
                                    if (!empty($value)) {
                                        $filePath = $value; 
                                        echo "<td class=\"px-6 py-4 text-center\">
                                        <button type=\"button\" class=\"focus:outline-none text-white bg-primary-color dark:bg-primary-color cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2\" disabled>
                                            <a href=\"$filePath\" class=\"download-button\" download>
                                                <svg class='h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'>
                                                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'></path>
                                                </svg>  
                                            </a>
                                        </button>
                                         </td>";
                                    } else {
                                        echo "<td class=\"px-6 py-4 text-center\"> - </td>";
                                    }
                                } else {
                                    echo "<td class=\"px-6 py-4 text-center\">$value</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-content" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab"
                     style="display: <?php echo $tabMahasiswa ? 'block' : 'none'; ?>">
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
                                echo "<td class=\"px-6 py-4 text-center\">$value</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-content" id="dosen" role="tabpanel" aria-labelledby="dosen-tab"
                     style="display: <?php echo $tabDosen ? 'block' : 'none'; ?>">
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
                                echo "<td class=\"px-6 py-6 text-center\">$value</td>";
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