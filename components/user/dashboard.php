<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../../dist/output.css" rel="stylesheet" />
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
  <title>Dashboard</title>
</head>

<body class="h-screen overflow-hidden" style="background: #edf2f7;">
  <div id="dashboard" class="h-screen flex flex-row">
    <?php include 'sidebar.php';?>
    <div id="dashboard-content" class="h-screen w-screen py-32">
      <div id="header" class="px-8">
        <h1 class="mb-6 text-4xl font-semibold">Denah Ruangan</h1>
        <hr class="border border-black">
      </div>
      <div id="option" class="flex gap-8 px-8 py-5">
        <div id="lantai">
          <select name="lantai" id="lantai" class="py-3 px-16 rounded-lg border border-primary-color" title="Lantai">
            <option value="5">Lantai 5</option>
            <option value="6">Lantai 6</option>
            <option value="7">Lantai 7</option>
            <option value="8">Lantai 8</option>
          </select>
        </div>
        <div id="tanggal">
          <input type="date" name="tanggal" id="tanggal" class="py-3 pl-8 pr-5 rounded-lg border border-primary-color">
        </div>
      </div>
      <div id="denah"></div>
      <div id="indikator"></div>
    </div>
  </div>
</body>

</html>