<?php
namespace OrangDalam\PeminjamanRuangan\Views\shared;
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <?php include 'head.php'; ?>
    <style>
        #container {
            background-image: url("/img/grapol.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        #gedung {
            background-image: url("/img/gedung.png");
        }
    </style>
</head>

<body class="box-content">
<div class="bg-black h-screen w-screen absolute opacity-30"></div>
<div id="container"
     class="min-h-screen bg-cover bg-no-repeat flex flex-col justify-center items-center">
    <section class="flex text-white w-3/4 rounded-3xl overflow-hidden z-20 justify-center">
        <div class="flex md:hidden w-8/12 bg-no-repeat bg-center bg-cover relative items-center"
             id="gedung">
        </div>
        <div class="w-4/12 md:w-full py-48 2xl:py-64 px-8 flex bg-neutral-color flex-col justify-center">

            <h2 class="text-text-color text-4xl font-medium">Welcome Back!</h2>
            <div class=" py-6 lg:w-full z-20 bg-neutral-color rounded-2xl flex gap-2 flex-col">
                <h1 class="font-semibold text-2xl text-text-color">Login</h1>
                <form method="POST" class="w-full ">
                    <div class="pb-2 text-left">
                        <label class="text-text-color"> NIM/NIP </label>
                        <input type="text" name="username" id="username" placeholder="Masukkan NIM/NIP..."
                               class="block w-full p-4 text-lg rounded-xl text-text-color border border-fourth-color mt-2"
                               required/>
                    </div>
                    <div class="pb-2 pt-4 text-left">
                        <label class="text-text-color"> Password </label>
                        <input class="block w-full p-4 text-lg rounded-xl text-text-color border border-fourth-color mt-2"
                               type="password" name="password" id="password" placeholder="Masukkan Password..."
                               required/>
                    </div>
                    <div class="pb-2 pt-4">
                        <button class="block w-full p-4 text-lg rounded-md bg-third-color hover:bg-[#263861]"
                                type="submit">
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