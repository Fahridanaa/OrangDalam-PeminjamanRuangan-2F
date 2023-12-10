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
                        Inbox Pesan
                    </h4>
                </div>

                <div class="flex flex-col px-4 py-4 mx-8 border-2 border-black rounded-lg justify-items-stretch">
                    <h1 class="mb-1 text-3xl font-semibold">Permintaan Booking</h1>
                    <h2 class="text-xl font-semibold">Permintaan Booking Masuk</h2>
                </div>
            </section>
        </div>
    </div>
</body>

</html>