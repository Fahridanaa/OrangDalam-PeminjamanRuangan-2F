<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include __DIR__ . '/../shared/head.php';
    use OrangDalam\PeminjamanRuangan\Controllers\Admin\AdminDashboardController;

    $peminjaman = new AdminDashboardController();

    $jumlah = $peminjaman->sum();
    ?>
</head>

<body class="overflow-hidden font-jakarta" style="background: #edf2f7;">
<div class="flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div class="min-h-screen w-full">
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
                            <?php echo $jumlah['jumlah'];?>
                        </h2>
                        <h2 class="text-3xl">
                            Peminjaman
                        </h2>
                    </div>
                </div>
                <div class="w-64 h-64 p-3 py-2 border-[3px] border-select-color text-select-color rounded-3xl">
                    <div class="flex flex-col flex-wrap w-56 p-5 pt-8 font-semibold border-2 border-select-color h-[14.5rem] rounded-3xl ">
                        <h2 class="text-6xl">
                            <?php echo $jumlah['disetujui'];?>
                        </h2>
                        <h2 class="text-3xl">
                            Peminjaman Disetujui
                        </h2>
                    </div>
                </div>
                <div class="w-64 h-64 p-3 py-2 border-[3px] border-danger-color text-danger-color rounded-3xl">
                    <div class="flex flex-col flex-wrap w-56 p-5 pt-8 font-semibold border-2 border-danger-color h-[14.5rem] rounded-3xl">
                        <h2 class="text-6xl">
                            <?php echo $jumlah['proses'];?>
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
                <table class="w-full text-base rtl:text-right">
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
                            $dataTable = $peminjaman->top();
                    foreach ($dataTable as $data) {
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
        </section>
    </div>
</div>
</body>

</html>