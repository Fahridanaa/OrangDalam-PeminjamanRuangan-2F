<?php
namespace OrangDalam\PeminjamanRuangan\Views\shared;

$flashMessage = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
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

<body>
<div id="container"
     class="min-h-screen bg-cover bg-no-repeat flex flex-col items-center">
    <div class="flex flex-auto text-white rounded-3xl overflow-hidden z-20 m-8 justify-center container overflow-y-hidden">
        <div class="flex md:hidden w-8/12 bg-no-repeat bg-center bg-cover relative items-center"
             id="gedung">
        </div>
        <div class="w-4/12 md:w-full py-4 flex-1 px-8 flex bg-neutral-color flex-col">
            <div class="py-6 lg:py-3 bg-neutral-color rounded-2xl flex flex-col flex-1 justify-center">
                <h2 class="text-text-color text-4xl font-medium mb-8 lg:mb-2 lg:text-center">Welcome Back!</h2>
                <form method="POST" class="flex flex-col">
                    <h1 class="font-semibold text-2xl text-text-color">Login</h1>
                    <div class="pb-1 text-left flex-auto">
                        <label class="text-text-color"> NIM/NIP </label>
                        <input type="text" name="username" id="username" placeholder="Masukkan NIM/NIP..."
                               class="block w-full text-lg rounded-xl text-text-color border border-fourth-color p-2 xl:p-4 mt-2"
                               required/>
                    </div>
                    <div class="pb-1 text-left flex-auto">
                        <label class="text-text-color"> Password </label>
                        <input class="block w-full text-lg rounded-xl text-text-color border border-fourth-color p-2 xl:p-4 mt-2"
                               type="password" name="password" id="password" placeholder="Masukkan Password..."
                               required/>
                    </div>
                    <div class="mb-1 flex-auto">
                        <button class="block w-full text-lg rounded-md bg-third-color p-3 xl:p-6 hover:bg-[#263861] mt-4"
                                type="submit">
                            Login
                        </button>
                    </div>
                    <div class="text-left text-gray-400 flex-auto">
                        <a href="#" class="hover:text-primary-color">Lupa Password?</a>
                    </div>
                </form>
                <div class="<?= $flashMessage['type'] ?> flex justify-center bg-<?= $flashMessage['color'] ?>-color mt-4 rounded-xl py-2 relative w-full">
                    <span class="text-xl text-center"><?= $flashMessage['message'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-black min-h-full min-w-full absolute top-0 opacity-30"></div>
</body>

</html>