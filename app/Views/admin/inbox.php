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
        <div class="min-h-screen w-full">
            <section class="flex flex-col items-stretch mt-4">
                <div class="flex pb-3 mx-8 mt-8 mb-4 border-b-2 border-black flex-nowrap">
                    <h4 class="pl-2 text-3xl font-bold font-jakarta">
                        Inbox Pesan
                    </h4>
                </div>

                
                    <?php
                    // Simulasi data notifikasi
                    $notifications = array(
                        array("Judul Notifikasi 1", "Keterangan notifikasi 1"),
                        array("Judul Notifikasi 2", "Keterangan notifikasi 2"),
                        array("Judul Notifikasi 3", "Keterangan notifikasi 3"),
                        // Tambahkan data lainnya jika ada
                    );

                    // Cek apakah ada notifikasi
                    if (!empty($notifications)) {
                        foreach ($notifications as $notification) {
                            echo "<div class=\"flex flex-col px-4 py-6 mx-8 border-b-2 border-black justify-items-stretch\">";
                            echo "<h1 class=\"mb-1 text-3xl font-semibold\">{$notification[0]}</h1>";
                            echo "<h2 class=\"text-xl font-semibold\">{$notification[1]}</h2>";
                            echo "</div>";
                        }
                    } else {
                        echo "<h1 class=\"mb-1 text-3xl font-semibold\">Tidak ada notifikasi</h1>";
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>

</html>