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

<body class="overflow-hidden font-jakarta" style="background: #edf2f7;">
<div class="flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div class="min-h-screen">
        <section class="flex flex-col items-stretch justify-start">
            <div class="flex pb-1 mx-10 my-10 border-b-2 border-black flex-nowrap">
                <h4 class="pl-2 text-3xl font-bold">
                    Dashboard
                </h4>
            </div>
            <div class="flex px-8 space-x-20">
                <div class="w-64 h-64 p-3 py-2 border-[3px] border-noFocus-color rounded-3xl text-noFocus-color">
                    <div class="flex flex-col flex-wrap w-56 h-[14.5rem] p-5 pt-8 font-semibold border-2 border-noFocus-color rounded-3xl ">
                        <h2 class="text-6xl">
                            32
                        </h2>
                        <h2 class="text-3xl">
                            Peminjaman
                        </h2>
                    </div>
                </div>
                <div class="w-64 h-64 p-3 py-2 border-[3px] border-select-color text-select-color rounded-3xl">
                    <div class="flex flex-col flex-wrap w-56 p-5 pt-8 font-semibold border-2 border-select-color h-[14.5rem] rounded-3xl ">
                        <h2 class="text-6xl">
                            10
                        </h2>
                        <h2 class="text-3xl">
                            Peminjaman Disetujui
                        </h2>
                    </div>
                </div>
                <div class="w-64 h-64 p-3 py-2 border-[3px] border-danger-color text-danger-color rounded-3xl">
                    <div class="flex flex-col flex-wrap w-56 p-5 pt-8 font-semibold border-2 border-danger-color h-[14.5rem] rounded-3xl">
                        <h2 class="text-6xl">
                            22
                        </h2>
                        <h2 class="text-3xl">
                            Dalam Proses
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col mt-4">
            <div class="flex pb-1 mx-10 my-10 border-b-2 border-black flex-nowrap">
                <h4 class="pl-2 text-3xl font-bold ">
                    Peminjaman Terbaru
                </h4>
            </div>
            <div class="relative justify-center px-8 overflow-x-auto">
                <table class="w-full text-base rtl:text-right ">
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
                            $dataTable = array(
                                array("Fahridana Ahmad", "Teknologi Informasi", "LIG 1, LSI 1", "Dipinjam Untuk Kegiatan Event Hacktober WRI", "20 November 2023", "10 Desember 2023"),
                                array("Haidar Aly", "Teknologi Informasi", "LSI 2", "Dipinjam Untuk Sempro", "21 November 2023", "11 Desember 2023"),
                                array("Haidar Aly", "Teknologi Informasi", "LSI 2", "Dipinjam Untuk Sempro", "21 November 2023", "11 Desember 2023"),
                                // Tambahkan data lainnya jika ada
                            );

                            foreach ($dataTable as $data) {
                                echo "<tr>";
                                foreach ($data as $value) {
                                    echo "<td class=\"px-6 py-4\">$value</td>";
                                }
                                echo "<td class=\"px-16 py-4\">
                                        <a href=\"\" class=\"flex items-center justify-center py-2 text-white rounded-md bg-blue-950\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"w-6 h-6\">
                                                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z\" />
                                            </svg>
                                        </a>
                                    </td>";
                                echo "</tr>";
                            }
                        ?>
                        <!-- <tr>
                            <th class="px-6 py-4">Fahridana Ahmad</th>
                            <th class="px-6 py-4">Teknologi Informasi</th>
                            <th class="px-6 py-4">LIG 1, LSI 1</th>
                            <th class="px-6 py-4">Dipinjam Untuk Kegiatan Event Hacktober WRI</th>
                            <th class="px-6 py-4">20 November 2023</th>
                            <th class="px-6 py-4">10 Desember 2023</th>
                            <th class="px-16 py-4">
                                    <a href="" class="flex items-center justify-center py-2 text-white rounded-md bg-blue-950">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </a>
                            </th>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
</body>

</html>