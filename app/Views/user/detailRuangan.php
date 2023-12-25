<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
    <style>
        input[type="date"]:focus {
            outline: none !important;
            box-shadow: none !important;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            order: -1;
            margin-right: 10px;
            filter: invert(1);
            color: red;
            width: 2rem;
            height: 2rem;
        }

        input[type="date"]::-webkit-datetime-edit-day-field,
        input[type="date"]::-webkit-datetime-edit-month-field,
        input[type="date"]::-webkit-datetime-edit-year-field {
            display: none;
        }
    </style>
</head>
<body class="antialiased">
<div class="flex relative">
    <?php
    include 'sidebar.php';

    use OrangDalam\PeminjamanRuangan\Controllers\User\DetailRuanganController;

    $detail = new DetailRuanganController();
    $i = 1;
    date_default_timezone_set('Asia/Jakarta');
    $waktu = date('H:i');
    ?>
    <div class="min-h-screen flex-auto py-12 relative ml-32 px-8 flex flex-col gap-4">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Detail Ruangan</h1>
            <hr class="border border-black">
        </div>
        <div class="flex justify-evenly flex-col lg:flex-row">
            <div class="px-4">
                <div x-data="{ image: 1 }" class="flex flex-col gap-4">
                    <div class="flex">
                        <img src="/public/img/ruang/lt8/rt13/1.jpg" class="rounded-xl max-w-2xl w-full"
                             x-show="image === 1">
                        <img src="/public/img/ruang/lt8/rt13/2.jpg" class="rounded-xl max-w-2xl w-full"
                             x-show="image === 2">
                        <img src="/public/img/ruang/lt8/rt13/3.jpg" class="rounded-xl max-w-2xl w-full"
                             x-show="image === 3">
                    </div>

                    <div class="flex -mx-2 mb-4 justify-between">
                        <img src="/public/img/ruang/lt8/rt13/1.jpg" class="rounded-lg max-w-xs max-h-[112px]"
                             x-on:click="image = 1">
                        <img src="/public/img/ruang/lt8/rt13/2.jpg" class="rounded-lg max-w-xs max-h-[112px]"
                             x-on:click=" image=2">
                        <img src="/public/img/ruang/lt8/rt13/3.jpg" class="rounded-lg max-w-xs max-h-[112px]"
                             x-on:click="image = 3">
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4 gap-3 flex flex-col w-full">
                <?= $detail->status() ?>
                <h2 class="mb-3 leading-tight tracking-tight border-b-2 border-black pb-4 font-bold text-2xl md:text-3xl">
                    <?php
                    echo $fasilitas[0]['nama'] ?? '';
                    ?>
                </h2>
                <div class="flex flex-col my-4 gap-3">
                    <span class="text-lg font-semibold">Detail Ruangan:</span>
                    <div class="flex bg-third-color rounded-lg justify-between p-4 text-neutral-color min-w-fit max-w-sm">
                        <div class="flex flex-col justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                 viewBox="0 0 256 256">
                                <path d="M208,136H176V104h16a16,16,0,0,0,16-16V40a16,16,0,0,0-16-16H64A16,16,0,0,0,48,40V88a16,16,0,0,0,16,16H80v32H48a16,16,0,0,0-16,16v16a16,16,0,0,0,16,16h8v40a8,8,0,0,0,16,0V184H184v40a8,8,0,0,0,16,0V184h8a16,16,0,0,0,16-16V152A16,16,0,0,0,208,136ZM64,40H192V88H64Zm32,64h64v32H96Zm112,64H48V152H208v16Z"></path>
                            </svg>
                            <span class="text-sm">Kapasitas</span>
                            <nobr class="text-lg font-semibold"><?php
                                echo $fasilitas[0]['kapasitas'] ?? '';
                                ?> Orang
                            </nobr>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                 viewBox="0 0 256 256">
                                <path d="M88,144V128a8,8,0,0,1,16,0v16a8,8,0,0,1-16,0Zm40,8a8,8,0,0,0,8-8V120a8,8,0,0,0-16,0v24A8,8,0,0,0,128,152Zm32,0a8,8,0,0,0,8-8V112a8,8,0,0,0-16,0v32A8,8,0,0,0,160,152Zm56-72v96h8a8,8,0,0,1,0,16H136v17.38a24,24,0,1,1-16,0V192H32a8,8,0,0,1,0-16h8V80A16,16,0,0,1,24,64V48A16,16,0,0,1,40,32H216a16,16,0,0,1,16,16V64A16,16,0,0,1,216,80ZM136,232a8,8,0,1,0-8,8A8,8,0,0,0,136,232ZM40,64H216V48H40ZM200,80H56v96H200Z"></path>
                            </svg>
                            <span class="text-sm">Proyektor</span>
                            <nobr class="text-lg font-semibold"><?php
                                echo $fasilitas[0]['Proyektor'] ?? '';
                                ?> unit
                            </nobr>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                 viewBox="0 0 256 256">
                                <path d="M184,184a32,32,0,0,1-32,32c-13.7,0-26.95-8.93-31.5-21.22a8,8,0,0,1,15-5.56C137.74,195.27,145,200,152,200a16,16,0,0,0,0-32H40a8,8,0,0,1,0-16H152A32,32,0,0,1,184,184Zm-64-80a32,32,0,0,0,0-64c-13.7,0-26.95,8.93-31.5,21.22a8,8,0,0,0,15,5.56C105.74,60.73,113,56,120,56a16,16,0,0,1,0,32H24a8,8,0,0,0,0,16Zm88-32c-13.7,0-26.95,8.93-31.5,21.22a8,8,0,0,0,15,5.56C193.74,92.73,201,88,208,88a16,16,0,0,1,0,32H32a8,8,0,0,0,0,16H208a32,32,0,0,0,0-64Z"></path>
                            </svg>
                            <span class="text-sm">AC</span>
                            <nobr class="text-lg font-semibold"><?php
                                echo $fasilitas[0]['AC'] ?? '';
                                ?> unit
                            </nobr>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center self-start">
                    <a href="/pinjam">
                        <button type="button"
                                class="h-14 px-6 py-2 w-full font-semibold rounded-lg text-primary-color border-third-color shadow-[0_4px_4px_0px_#00000025] border-[3px] hover:bg-third-color hover:text-neutral-color">
                            Pinjam Sekarang
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="mb-4 border-b border-b-black">
                    <span id="detail-ruangan-jadwal-matkul-choose"
                          class="pb-1 mx-2 cursor-pointer hover:text-primary-color hover:border-b-2 hover:border-b-primary-color">Jadwal Mata Kuliah</span>
                <span id="detail-ruangan-jadwal-peminjaman-choose"
                      class="pb-1 mx-2 cursor-pointer hover:text-primary-color hover:border-b-2 hover:border-b-primary-color">Peminjaman Acara/Kegiatan</span>
            </div>
            <table id="detail-ruangan-jadwal-matkul"
                   class="w-full text-center mb-12 shadow-[-5px_-5px_4px_0px_#00000025] rounded-xl hidden">
                <tr class="bg-primary-color text-neutral-color">
                    <th colspan="6" class="rounded-t-xl text-start pt-1 px-3 focus:outline-none focus:shadow-none!">
                        <div class="flex items-center relative">
                            <input type="date" id="tanggalInput"
                                   name="tanggalPilih"
                                   class="bg-primary-color text-sm w-10" hidden>
                            <span id="tanggalFormatted"></span>
                        </div>
                    </th>
                </tr>
                <?php
                $times = [
                    ['07:00', '07:50'],
                    ['07:50', '08:40'],
                    ['08:40', '09:30'],
                    ['09:40', '10:30'],
                    ['10:30', '11:20'],
                    ['11:20', '12:10'],
                    ['12:50', '13:40'],
                    ['13:40', '14:30'],
                    ['14:30', '15:20'],
                    ['15:30', '16:20'],
                    ['16:20', '17:10']
                ];


                $jadwalHariIni = $detail->getJadwal();

                foreach ($times as $time) {
                    $bg = '';
                    if ($waktu >= $time[0] && $waktu <= $time[1]) {
                        $bg = 'bg-danger-color';
                    }

                    echo '<tr class="border-b border-black">';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $time[0] . '-' . $time[1] . '</td>';

                    $jadwalMatkul = null;
                    foreach ($jadwalHariIni as $jadwal) {
                        if ($jadwal['mulai'] <= $time[0] && $jadwal['selesai'] >= $time[1]) {
                            $jadwalMatkul = $jadwal;
                            break;
                        }
                    }

                    if ($jadwalMatkul) {
                        echo '<td>' . $jadwalMatkul['namaMK'] . '</td>';
                        echo '<td>' . $jadwalMatkul['namaDosen'] . '</td>';
                        echo '<td>' . $jadwalMatkul['namaKelas'] . '</td>';
                    } else {
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                    }

                    echo '<td><div class="rounded-full ' . $bg . ' w-4 h-4"></div></td>';
                    echo '</tr>';

                    $i++;
                }
                ?>
            </table>
            <table id="detail-ruangan-jadwal-peminjaman"
                   class="w-full text-center mb-12 shadow-[-5px_-5px_4px_0px_#00000025] rounded-xl hidden">
                <tr class="bg-primary-color text-neutral-color">
                    <th colspan="6"
                        class="rounded-t-xl text-start pt-1 px-3 py-10 focus:outline-none focus:shadow-none!">
                    </th>
                </tr>
                <?php
                $counter = 1;
                foreach ($jadwalAcara as $jadwal) {
                    $startDateTime = new DateTime($jadwal['tanggalAcara'] . ' ' . $jadwal['mulai']);
                    $endDateTime = new DateTime($jadwal['tanggalAcara'] . ' ' . $jadwal['selesai']);
                    $isNow = (new DateTime() >= $startDateTime) && (new DateTime() <= $endDateTime);
                    ?>
                    <tr class="border-b border-black">
                        <td><?= $counter++ ?></td>
                        <td><?= date('d F Y', strtotime($jadwal['tanggalAcara'])) ?></td>
                        <td><?= date('H:i', strtotime($jadwal['mulai'])) ?>
                            - <?= date('H:i', strtotime($jadwal['selesai'])) ?></td>
                        <td><?= $jadwal['keterangan'] ?></td>
                        <td><?= $jadwal['nama'] ?></td>
                        <td>
                            <?php if ($isNow) : ?>
                                <div class="w-4 h-4 rounded-full bg-warn-color"></div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php }
                if ($counter == 1) {
                    echo '<td>Tidak ada Peminjaman</td>';
                }
                ?>
            </table>

        </div>
    </div>
</div>
<script>
    const detailRuanganButton = ['detail-ruangan-jadwal-matkul-choose', 'detail-ruangan-jadwal-peminjaman-choose'];
    const detailRuanganJadwal = ['detail-ruangan-jadwal-matkul', 'detail-ruangan-jadwal-peminjaman'];

    detailRuanganButton.forEach((button, index) => {
        document.getElementById(button).addEventListener('click', () => {
            detailRuanganButton.forEach((button) => {
                document.getElementById(button).classList.remove('border-b-primary-color', 'text-primary-color', 'border-b-2');
            });
            detailRuanganJadwal.forEach((jadwal) => {
                document.getElementById(jadwal).classList.add('hidden');
            });
            document.getElementById(button).classList.add('border-b-primary-color', 'text-primary-color', 'border-b-2');
            document.getElementById(detailRuanganJadwal[index]).classList.remove('hidden');
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        detailRuanganButton.forEach((button) => {
            document.getElementById(button).classList.remove('border-b-primary-color', 'text-primary-color', 'border-b-2');
        });

        document.getElementById(detailRuanganButton[0]).classList.add('border-b-primary-color', 'text-primary-color', 'border-b-2');

        detailRuanganJadwal.forEach((jadwal) => {
            document.getElementById(jadwal).classList.add('hidden');
        });

        document.getElementById(detailRuanganJadwal[0]).classList.remove('hidden');
    });

    function formatDate() {
        let tanggalInput = document.getElementById("tanggalInput").value;

        let tanggal = new Date(tanggalInput);
        let options = {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        };
        let tanggalFormatted = tanggal.toLocaleDateString('id-ID', options);

        document.getElementById("tanggalFormatted").textContent = tanggalFormatted;
    }

    document.getElementById("tanggalInput").addEventListener("change", formatDate);

    document.getElementById('tanggalInput').valueAsDate = new Date();
    formatDate();
</script>
</body>
<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

</html>