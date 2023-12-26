<?php
namespace OrangDalam\PeminjamanRuangan\Views\user;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body>
<?php include __DIR__ . '/../shared/flashMessage.php' ?>
<div id="user-profile" class="flex">
    <?php include 'sidebar.php'; ?>
    <div id="user-profile-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12 ml-32">
        <div>
            <div id="user-profile-header" class="mb-6">
                <h1 class="text-4xl font-semibold mb-6">Profile</h1>
                <hr class="border border-black">
            </div>
            <div id="user-profile-card"
                 class="flex justify-evenly items-center bg-neutral-color border-2 border[#C8C1C1] py-4 px-8 mx-auto gap-4 rounded-3xl min-w-[512px]">
                <div id="user-profile-pic" class="flex-[1] flex justify-center min-w-[12rem]">
                    <?php
                    if ($_SESSION['user']['profile'] == null) {
                        $profile = "/img/no-profile.jpg";
                    }
                    else {
                        $profile = "/img/user-picture.png";
                    }
                    ?>
                    <img src="<?php echo $profile;?>" alt="user-profile-pic" class="rounded-full">
                </div>
                <div id="user-profile-data" class="flex-[3]">
                    <div id="user-profile-name" class="border-b border-black flex p-2">
                        <span>Nama</span>
                        <span class="flex-1 text-end"><?php echo $_SESSION['user']['nama'] ?></span>
                    </div>
                    <?php
                    if ($_SESSION['level'] == 'Mahasiswa') {
                        echo '<div id="user-profile-nim" class="border-b border-black flex p-2">
                            <span>NIM</span>
                            <span class="flex-1 text-end">'. $_SESSION['user']['nim'] . '</span>
                        </div>
                        <div id="user-profile-jurusan" class="border-b border-black flex p-2">
                            <span>Jurusan</span>
                            <span class="flex-1 text-end">' . $_SESSION['user']['jurusan'] . '</span>
                        </div>
                        <div id="user-profile-prodi" class="border-b border-black flex p-2">
                            <span>Prodi</span>
                            <span class="flex-1 text-end">' . $_SESSION['user']['prodi'] . '</span>
                        </div>';
                    }
                    else {
                        echo '<div id="user-profile-nidn" class="border-b border-black flex p-2">
                                    <span>NIDN</span>
                                    <span class="flex-1 text-end">'. $_SESSION['user']['nidn'] . '</span>
                              </div>';
                    }
                    ?>
                    <div id="user-profile-tel" class="border-b border-black flex p-2">
                        <span>Nomor Telepon</span>
                        <span class="flex-1 text-end"><?php echo $_SESSION['user']['telepon']; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="user-ganti-password">
            <div id="user-ganti-password-header" class="mb-6">
                <h1 class="text-4xl font-semibold mb-6">Ganti Password</h1>
                <hr class="border border-black">
            </div>
            <div id="user-ganti-password-card"
                 class="self-center bg-neutral-color border-2 border[#C8C1C1] py-4 px-10 rounded-3xl mb-6">
                <form method="POST" class="flex flex-col gap-8 my-4">
                    <div class="flex gap-2 justify-between items-center">
                        <label for="password-sekarang" class="min-w-[12rem]">Password Sekarang</label>
                        <input type="password" name="password-sekarang" id="password-sekarang"
                               class="border border-black rounded-lg px-4 py-2 flex-auto max-w-[24rem]" required>
                    </div>
                    <div class="flex gap-2 justify-between items-center">
                        <label for="password-baru" class="min-w-[12rem]">Password Baru</label>
                        <input type="password" name="password-baru" id="password-baru"
                               class="border border-black rounded-lg px-4 py-2 flex-auto max-w-[24rem]" required>
                    </div>
                    <div class="flex gap-2 justify-between items-center">
                        <label for="konfirmasi-password-baru" class="min-w-[12rem]">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi-password-baru" id="konfirmasi-password-baru"
                               class="border border-black rounded-lg px-4 py-2 flex-auto max-w-[24rem]" required>
                    </div>
                    <button class="bg-third-color rounded-full px-10 py-2 text-neutral-color align-middle flex items-center self-end cursor-pointer hover:bg-primary-color"
                            type="submit">
                        <span>Ganti</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>