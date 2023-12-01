<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../../../public/css/output.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="../../../public/icon/favicon.ico" />
  <style>
  #container {
    background-image: url("../../../public/img/grapol.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }
  </style>
  <title>Login</title>
</head>

<body>
  <div id="container" class="min-h-screen bg-grapol bg-cover bg-no-repeat flex flex-col justify-center">
    <section class="flex text-white w-3/5 rounded-3xl overflow-hidden mx-auto">
      <div class="lg:flex lg:w-3/4 bg-gedung bg-no-repeat bg-center bg-cover relative items-center">
      </div>
      <div class="lg:w-1/2 flex-auto w-1/4 px-4 py-44 flex z-0 bg-neutral-color flex-col justify-center">
        <h2 class="text-text-color text-4xl font-medium">Welcome Back!</h2>
        <div class=" py-6 lg:w-full z-20 bg-neutral-color rounded-2xl flex gap-2 flex-col">
          <h1 class="font-semibold text-2xl text-text-color">Login</h1>
          <form action="../../../function/cek_login.php" class="w-full ">
            <div class="pb-2 text-left">
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
            <div class="text-left text-gray-400">
              <a href="#" class="hover:text-primary-color">Lupa Password?</a>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</body>

</html>