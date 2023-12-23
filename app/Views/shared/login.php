<?php
namespace OrangDalam\PeminjamanRuangan\Views\shared;
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <?php include 'head.php'; ?>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #container {
            background-image: url("/img/grapol.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body>
<?php include __DIR__ . '/../shared/flashMessage.php' ?>
<div id="container"
     class="min-h-[100vh] relative flex items-center">
    <div class="text-white rounded-xl overflow-hidden mx-auto flex lg:max-h-screen relative min-w-[60%] max-w-[80%]">
        <img src="/img/gedung.png" class="hidden lg:block" alt="gedung"/>
        <div class="py-4 px-8 bg-neutral-color flex-auto">
            <div class="flex flex-col h-full justify-center">
                <h2 class="text-text-color text-4xl font-medium mb-8 lg:mb-2 text-center lg:text-start">Welcome
                    Back!</h2>
                <form method="POST" class="">
                    <h1 class="[font-size:_clamp(.75em,2rem,10em)] text-text-color">Login</h1>
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
            </div>
        </div>
    </div>

</div>
<div class="bg-black absolute top-0 -z-10 opacity-30"></div>
</body>

</html>