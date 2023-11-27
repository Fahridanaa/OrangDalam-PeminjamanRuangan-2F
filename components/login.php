<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../dist/output.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="../icon/favicon.ico" />
  <title>Login</title>
</head>

<body>
  <section class="min-h-screen flex items-stretch text-white">
    <div class="lg:flex flex-auto lg:w-3/4 hidden bg-white bg-no-repeat bg-cover relative items-center">
      <div class="w-full px-24 z-10">
        <h1 class="text-5xl font-bold text-center tracking-wide text-text-color">
          Content Here
        </h1>
      </div>
    </div>
    <div class="lg:w-1/2 flex-auto w-1/4 flex items-center justify-center text-center md:px-16 px-0 z-0"
      style="background-color: #2e4374">
      <div class="w-11/12 py-6 md:px-4 lg:w-full z-20 bg-white rounded-2xl flex gap-5 flex-col">
        <h1 class="mt-14 text-4xl text-text-color">Login</h1>
        <form action="cek_login.php" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
          <div class="pb-2 pt-4 text-left">
            <label class="text-text-color"> NIM/NIP </label>
            <input type="text" name="id" id="id" placeholder="Masukkan NIM/NIP..."
              class="block w-full p-4 text-lg rounded-xl text-text-color border border-fourth-color mt-2" />
          </div>
          <div class="pb-2 pt-4 text-left">
            <label class="text-text-color"> Password </label>
            <input class="block w-full p-4 text-lg rounded-xl text-text-color border border-fourth-color mt-2"
              type="password" name="password" id="password" placeholder="Masukkan Password..." />
          </div>

          <div class="pb-2 pt-4">
            <button class="block w-full p-4 text-lg rounded-md bg-primary-color hover:bg-[#263861]" type="submit">
              Login
            </button>
          </div>
          <div class="mb-14 text-left text-gray-400">
            <a href="#" class="hover:text-primary-color">Lupa Password?</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>