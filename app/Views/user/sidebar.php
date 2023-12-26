<?php
$isActive = function ($path) {
    return (strpos($_SERVER['REQUEST_URI'], $path) !== false) ? 'fill-neutral-color text-neutral-color' : 'fill-fourth-color text-fourth-color';
};

?>

<div class="bg-primary-color min-h-screen fixed z-20">
    <div class="flex w-32 flex-col items-center justify-between h-screen">
        <div class="mt-8 mb-2 flex flex-col justify-center items-center">
            <img src="/public/img/logo.png">
        </div>
        <div>
            <ul class="flex flex-col justify-between rounded-md h-full">
                <li class="flex items-center justify-center">
                    <a class="flex items-center justify-center rounded-md flex-col group cursor-pointer my-2 xl:my-4"
                       href="/dashboard">
                        <?php
                        $activeClass = $isActive('/dashboard');

                        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . $activeClass . ' w-6 h-6 group-hover:fill-neutral-color" >';
                        echo '<path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />';
                        echo '<path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" /> </svg>';
                        echo '<span class="' . $activeClass . ' group-hover:text-neutral-color mt-2">Home</span>';
                        ?>
                    </a>
                </li>
                <li class="flex items-center justify-center">
                    <a class="flex items-center justify-center rounded-md flex-col group group cursor-pointer my-2 xl:my-4"
                       href="/pinjam">
                        <?php
                        $activeClass = $isActive('/pinjam');

                        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . $activeClass . ' w-6 h-6 group-hover:fill-neutral-color">';
                        echo '<path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z"/></svg>';
                        echo '<span class="' . $activeClass . '  group-hover:text-neutral-color mt-2">Pinjam</span>';
                        ?>
                    </a>

                </li>
                <li class="flex items-center justify-center">
                    <a class="flex items-center justify-center rounded-md flex-col group group cursor-pointer my-2 xl:my-4"
                       href="/pesan">
                        <?php
                        $activeClass = $isActive('/pesan');

                        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . $activeClass . ' w-6 h-6 group-hover:fill-neutral-color">';
                        echo '<path fill-rule="evenodd" d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z" clip-rule="evenodd"/>
                        </svg>';
                        echo '<span class="' . $activeClass . ' group-hover:text-neutral-color mt-2">Inbox</span>';
                        ?>
                    </a>

                </li>
                <li class="flex items-center justify-center">
                    <a class="flex items-center justify-center rounded-md flex-col group group cursor-pointer my-2 xl:my-4"
                       href="/riwayat">
                        <?php
                        $activeClass = $isActive('/riwayat');

                        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . $activeClass . ' w-6 h-6 group-hover:fill-neutral-color">';
                        echo '<path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd"/>';
                        echo '<path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z"/>
                        </svg>';
                        echo '<span class="' . $activeClass . ' group-hover:text-neutral-color mt-2">History</span>';
                        ?>
                    </a>
                </li>
                <li class="flex items-center justify-center">
                    <?php
                    if (isset($_SESSION['user']['ketua'])) {
                        $isRequest = $_SESSION['user']['ketua'] == null;
                    }

                    if (($_SESSION['level'] == 'Dosen')) {
                        $isRequest = true;
                    }
                    ?>
                    <a class="flex items-center justify-center rounded-md flex-col cursor-<?= $isRequest ? 'pointer group' : 'not-allowed' ?> my-2 xl:my-4"
                        <?= $isRequest ? 'href="/konfirmasi-ruangan"' : '' ?>>
                        <?php
                        $activeClass = $isActive('/konfirmasi-ruangan');

                        echo '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2E4374" class="' . $activeClass . ' w-6 h-6 group-hover:fill-neutral-color"  >';
                        echo '<path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12"/>
                        </svg>';
                        echo '<span class="' . $activeClass . ' group-hover:text-neutral-color mt-2">Request</span>';
                        ?>
                    </a>
                </li>

            </ul>
        </div>
        <div>
            <ul class="flex flex-col justify-around rounded-md h-full">
                <li class="flex items-center justify-center">
                    <img src="/public/img/user-picture.png" class="rounded-full w-10 h-10 my-2 xl:my-4">
                </li>
                <li class="flex items-center justify-center">
                    <a class="rounded-md group cursor-pointer my-2 xl:my-4" href="/profile">
                        <?php
                        $activeClass = $isActive('/profile');

                        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . $activeClass . ' w-6 h-6 group-hover:fill-neutral-color">';
                        echo '<path fill-rule="evenodd"
                                  d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                                  clip-rule="evenodd"/>
                        </svg>';
                        ?>
                    </a>
                </li>
                <li class="flex items-center justify-center my-2 xl:my-4">
                    <a class="rounded-md group cursor-pointer" href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-6 h-6 fill-fourth-color hover:fill-neutral-color">
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