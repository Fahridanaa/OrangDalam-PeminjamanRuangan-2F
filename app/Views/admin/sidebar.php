<?php
$isActive = function ($path) {
    return ($_SERVER['REQUEST_URI'] == $path);
};

?>

<div class="h-screen bg-primary-color w-fit">
    <div class="flex flex-col items-center h-screen">
        <div class="flex flex-col justify-between my-10 rounded-md">
            <div class="rounded-lg group flex flex-col items-center gap-2">
                <img class="rounded-full w-32 h-32 group-hover:opacity-50"
                     src="/img/user-picture.png" alt="profile">
                <div class="flex flex-col gap-1">
                    <h2 class="text-xl font-medium text-center text-neutral-color">
                        Selamat Datang
                    </h2>
                    <p class="text-2xl text-center text-neutral-color">Administrator</p>
                </div>
            </div>
        </div>
        <div id="container" class="flex flex-col justify-between flex-1">
            <ul class="flex flex-col justify-center gap-4">
                <li class="flex items-center py-2  <?= (($isActive('/dashboard')) ? 'bg-neutral-color' : '') ?> group hover:bg-neutral-color">
                    <a class="flex items-center justify-between gap-3 rounded-md cursor-pointer text-l w-full pl-8 pr-20"
                       href="/dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="<?= ($isActive('/dashboard')) ? 'fill-primary-color' : 'fill-neutral-color' ?> w-6 h-6 group-hover:fill-primary-color">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"/>
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"/>
                        </svg>
                        <span class="<?= ($isActive('/dashboard')) ? 'text-primary-color' : 'text-neutral-color' ?> group-hover:text-primary-color">Dashboard</span>
                    </a>
                </li>
                <li class="flex items-center py-2 <?= (($isActive('/konfirmasiPinjam')) ? 'bg-neutral-color' : '') ?> group hover:bg-neutral-color">
                    <a class="flex items-center justify-between gap-3 rounded-md cursor-pointer text-l w-full pl-8 pr-20"
                       href="/konfirmasiPinjam">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="white"
                             class="    fill-primary-color w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12"/>
                        </svg>
                        <span class="<?= ($isActive('/konfirmasiPinjam')) ? 'text-primary-color' : 'text-neutral-color' ?> group-hover:text-primary-color">Konfirmasi</span>
                    </a>

                </li>
                <li class="flex items-center py-2 <?= (($isActive('/inbox')) ? 'bg-neutral-color' : '') ?> group hover:bg-neutral-color">
                    <a class="flex items-center justify-between gap-3 rounded-md cursor-pointer w-full text-l pl-8 pr-[120px]"
                       href="/inbox">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="<?= ($isActive('/inbox')) ? 'fill-primary-color' : 'fill-neutral-color' ?> w-6 h-6 group-hover:fill-primary-color">
                            <path fill-rule="evenodd"
                                  d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span class="<?= ($isActive('/inbox')) ? 'text-primary-color' : 'text-neutral-color' ?> group-hover:text-primary-color">Inbox</span>
                    </a>

                </li>
                <li class="flex items-center py-2 <?= (($isActive('/history')) ? 'bg-neutral-color' : '') ?> group hover:bg-neutral-color">
                    <a class="flex items-center justify-between gap-3 rounded-md cursor-pointer w-full text-l pl-8 pr-28"
                       href="/history">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="<?= ($isActive('/history')) ? 'fill-primary-color' : 'fill-neutral-color' ?> w-6 h-6 group-hover:fill-primary-color">
                            <path fill-rule="evenodd"
                                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                                  clip-rule="evenodd"/>
                            ';
                            <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z"/>
                        </svg>
                        <span class="<?= ($isActive('/history')) ? 'text-primary-color' : 'text-neutral-color' ?> group-hover:text-primary-color">History</span>
                    </a>

                </li>

            </ul>

            <ul class="flex flex-col justify-center">
                <li class="flex items-center p-5 justify-center">
                    <a class="flex items-center justify-between gap-3 rounded-md cursor-pointer text-l group"
                       href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-7 h-7 fill-neutral-color hover:fill-fourth-color">
                            <path fill-rule="evenodd"
                                  d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
            </ul>

        </div>

    </div>
</div>