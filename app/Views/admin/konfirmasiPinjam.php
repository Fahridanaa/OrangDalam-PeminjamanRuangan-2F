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

<body class="overflow-hidden font-jakarta">
    <div class="flex flex-row">
        <?php include 'sidebar.php'; ?>
        <div class="min-h-screen">
            <section class="flex flex-col items-stretch mt-4">
                <div class="flex pb-3 mx-8 my-8 border-b-2 border-black flex-nowrap">
                    <h4 class="pl-2 text-3xl font-bold font-jakarta">
                        Konfirmasi Peminjaman
                    </h4>
                </div>

                <div id="default-tab-content">
                    <div class="relative justify-center px-8 overflow-x-auto" id="semua" role="tabpanel" aria-labelledby="semua-tab">
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
                                $dataTable = array(
                                    array("Fahridana Ahmad", "LIG 1, LSI 1", "10 Desember 2023", "081001012040", "[File Tanda Pengenal]", "[File Surat Peminjaman]"),
                                    array("Haidar Aly", "LSI 2", "11 Desember 2023", "081001012041", "[File Tanda Pengenal]", "[File Surat Peminjaman]"),
                                    array("Haidar Aly", "LSI 2", "11 Desember 2023", "081001012042", "[File Tanda Pengenal]", "[File Surat Peminjaman]"),
                                    array("Haidar Aly", "LSI 2", "11 Desember 2023", "081001012042", "[File Tanda Pengenal]", "[File Surat Peminjaman]"),
                                    array("Haidar Aly", "LSI 2", "11 Desember 2023", "081001012042", "[File Tanda Pengenal]", ""),
                                    // Tambahkan data lainnya jika ada
                                );

                                foreach ($dataTable as $data) {
                                    echo "<tr>";
                                    foreach ($data as $value) {
                                        echo "<td class=\"px-6 py-4\">$value</td>";
                                    }
                                    echo '<td class="px-6 py-4">';
                                    $tombolTerimaDitekan = false; // Ganti dengan kondisi sesuai kebutuhan

                                    // Cek apakah kolom [File Surat Peminjaman] memiliki value
                                    $filePeminjaman = $data[5]; // Kolom [File Surat Peminjaman] berada pada indeks 5

                                    // Cek apakah request sudah disetujui (button Terima ditekan)
                                    $requestDisetujui = $tombolTerimaDitekan; // Ganti dengan kondisi sesuai kebutuhan

                                    if (!$requestDisetujui) {
                                        // Jika request belum disetujui, tampilkan button Terima dan Tolak
                                        if (empty($filePeminjaman)) {
                                            // Jika [File Surat Peminjaman] kosong, tampilkan button Proses dan Tolak
                                            echo '<button type="button" class="focus:outline-none text-white bg-yellow-400 dark:bg-yellow-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" disabled>Proses</button>';
                                            echo '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Tolak</button>';
                                        } else {
                                            // Jika [File Surat Peminjaman] terisi, tampilkan button Terima dan Tolak
                                            echo '<button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Terima</button>';
                                            echo '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Tolak</button>';
                                        }
                                    } else {
                                        // Jika request sudah disetujui, tampilkan button Batalkan
                                        echo '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batalkan</button>';
                                    }
                                    echo '</td>';
                                    echo "</tr>";
                                }
                                ?>

                                <!-- <tr>
                                    <th class="px-6 py-4">Fahridana Ahmad</th>
                                    <th class="px-6 py-4">LIG 1, LSI 1</th>
                                    <th class="px-6 py-4">10 Desember 2023</th>
                                    <th class="px-6 py-4">0881977124561</th>
                                    <th class="px-6 py-4">
                                        <div class="flex items-center justify-center p-2 rounded-md bg-blue-950 w-30 h-30">
                                            <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4">
                                        <div class="flex items-center justify-center p-2 rounded-md bg-blue-950 w-30 h-30">
                                            <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4">
                                        <button type="button" class="focus:outline-none text-white bg-yellow-400 dark:bg-yellow-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" disabled>Proses</button>
                                        <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Terima</button>
                                        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Tolak</button>
                                        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batalkan</button>
                                    </th>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>