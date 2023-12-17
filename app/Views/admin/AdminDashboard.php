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
                        for ($i = 0; $i < count($data); $i++) {
                            echo "<td class=\"px-6 py-4 text-center\">$data[$i]</td>";
                        }
//                        echo '<td class="px-6 py-4 flex justify-center">';
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