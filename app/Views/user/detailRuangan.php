<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body class="antialiased">
<div class="h-screen flex">
    <?php include 'sidebar.php'; ?>
    <div class="h-screen w-screen py-20 ml-32 px-8 flex flex-col gap-12">
        <div id="header">
            <h1 class="text-4xl font-semibold mb-6">Detail Ruangan</h1>
            <hr class="border border-black">
        </div>
        <div class="flex justify-evenly pl-16 md:flex-col">
            <div class="px-4">
                <div x-data="{ image: 1 }" class="flex flex-col gap-4">
                    <div class="flex">
                        <img src="/img/ruang/lt8/rt13/1.jpg" class="rounded-xl max-w-2xl md:w-full"
                             x-show="image === 1">
                        <img src="/img/ruang/lt8/rt13/2.jpg" class="rounded-xl max-w-2xl md:w-full"
                             x-show="image === 2">
                        <img src="/img/ruang/lt8/rt13/3.jpg" class="rounded-xl max-w-2xl md:w-full"
                             x-show="image === 3">
                    </div>

                    <div class="flex -mx-2 mb-4 justify-between">
                        <img src="/img/ruang/lt8/rt13/1.jpg" class="rounded-lg max-w-xs max-h-[112px]"
                             x-on:click="image = 1">
                        <img src="/img/ruang/lt8/rt13/2.jpg" class="rounded-lg max-w-xs max-h-[112px]"
                             x-on:click=" image=2">
                        <img src="/img/ruang/lt8/rt13/3.jpg" class="rounded-lg max-w-xs max-h-[112px]"
                             x-on:click="image = 3">
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4 gap-3 flex flex-col w-full">
                <span class="text-neutral-color px-3 py-1 bg-danger-color rounded-md self-start">Digunakan</span>
                <h2 class="mb-3 leading-tight tracking-tight border-b-2 border-black pb-4 font-bold text-2xl md:text-3xl">
                    Lab
                    Sistem Informasi 1</h2>
                <div class="flex flex-col my-4 gap-3">
                    <span class="text-lg font-semibold">Detail Ruangan:</span>
                    <div class="flex bg-third-color rounded-lg justify-between p-4 text-neutral-color self-start">
                        <div class="flex flex-col justify-center items-center mx-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                 viewBox="0 0 256 256">
                                <path d="M208,136H176V104h16a16,16,0,0,0,16-16V40a16,16,0,0,0-16-16H64A16,16,0,0,0,48,40V88a16,16,0,0,0,16,16H80v32H48a16,16,0,0,0-16,16v16a16,16,0,0,0,16,16h8v40a8,8,0,0,0,16,0V184H184v40a8,8,0,0,0,16,0V184h8a16,16,0,0,0,16-16V152A16,16,0,0,0,208,136ZM64,40H192V88H64Zm32,64h64v32H96Zm112,64H48V152H208v16Z"></path>
                            </svg>
                            <span class="text-sm">Kapasitas</span>
                            <span class="text-lg font-semibold">30 Orang</span>
                        </div>
                        <div class="flex flex-col justify-center items-center mx-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                 viewBox="0 0 256 256">
                                <path d="M88,144V128a8,8,0,0,1,16,0v16a8,8,0,0,1-16,0Zm40,8a8,8,0,0,0,8-8V120a8,8,0,0,0-16,0v24A8,8,0,0,0,128,152Zm32,0a8,8,0,0,0,8-8V112a8,8,0,0,0-16,0v32A8,8,0,0,0,160,152Zm56-72v96h8a8,8,0,0,1,0,16H136v17.38a24,24,0,1,1-16,0V192H32a8,8,0,0,1,0-16h8V80A16,16,0,0,1,24,64V48A16,16,0,0,1,40,32H216a16,16,0,0,1,16,16V64A16,16,0,0,1,216,80ZM136,232a8,8,0,1,0-8,8A8,8,0,0,0,136,232ZM40,64H216V48H40ZM200,80H56v96H200Z"></path>
                            </svg>
                            <span class="text-sm">Proyektor</span>
                            <span class="text-lg font-semibold">1 unit</span>
                        </div>
                        <div class="flex flex-col justify-center items-center mx-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                 viewBox="0 0 256 256">
                                <path d="M184,184a32,32,0,0,1-32,32c-13.7,0-26.95-8.93-31.5-21.22a8,8,0,0,1,15-5.56C137.74,195.27,145,200,152,200a16,16,0,0,0,0-32H40a8,8,0,0,1,0-16H152A32,32,0,0,1,184,184Zm-64-80a32,32,0,0,0,0-64c-13.7,0-26.95,8.93-31.5,21.22a8,8,0,0,0,15,5.56C105.74,60.73,113,56,120,56a16,16,0,0,1,0,32H24a8,8,0,0,0,0,16Zm88-32c-13.7,0-26.95,8.93-31.5,21.22a8,8,0,0,0,15,5.56C193.74,92.73,201,88,208,88a16,16,0,0,1,0,32H32a8,8,0,0,0,0,16H208a32,32,0,0,0,0-64Z"></path>
                            </svg>
                            <span class="text-sm">AC</span>
                            <span class="text-lg font-semibold">2 unit</span>
                        </div>
                    </div>

                </div>
                <div class="flex justify-center items-center self-start">
                    <button type="button"
                            class="h-14 px-6 py-2 w-full font-semibold rounded-lg text-primary-color border-third-color border-[3px]">
                        Pinjam Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- partial -->
<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
</html>