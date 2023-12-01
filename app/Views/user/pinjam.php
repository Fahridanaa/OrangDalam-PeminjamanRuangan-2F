<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../../../public/css/output.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="../icon/favicon.ico" />
  <title>Pinjam</title>
</head>

<body class="h-screen overflow-hidden" style="background: #edf2f7;">
  <div id="Peminjaman" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="Peminjaman-content" class="h-screen w-screen py-20">
      <div id="header" class="px-8">
        <div id="head" class="flex justify-between items-center mb-6">
          <h1 class="text-4xl font-semibold">Pinjam Ruangan</h1>
          <button class="bg-third-color rounded-full py-3 px-10 text-neutral-color">Pinjam</button>
        </div>
        <hr class="border border-black">
      </div>
      <div id="card-container">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>
</body>

</html>