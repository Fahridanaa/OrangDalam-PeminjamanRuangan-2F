<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include __DIR__ . '/../shared/head.php';
    use OrangDalam\PeminjamanRuangan\Models\AuthModel;

    $user = new AuthModel();

    $data = $user->getProfile($_SESSION['id']);
    ?>
</head>
<body>
<div id="user-profile" class="flex">
    <?php include 'sidebar.php'; ?>
    <div id="user-profile-content" class="h-screen w-screen py-20 px-8 flex flex-col gap-12 ml-32">
        <div>
            <div id="user-profile-header" class="mb-6">
                <h1 class="text-4xl font-semibold mb-6">Profile</h1>
                <hr class="border border-black">
            </div>
            <div id="user-profile-card"
                 class="flex justify-evenly items-center bg-neutral-color border-2 border[#C8C1C1] py-12 px-24 gap-24 rounded-3xl">
                <div id="user-profile-pic" class="flex-[1] flex justify-center">
                    <img src="/img/user-picture.png" alt="user-profile-pic" class="rounded-full">
                </div>
                <div id="user-profile-data" class="flex-[3]">
                    <div id="user-profile-name" class="border-b border-black flex p-2">
                        <span>Nama</span>
                        <span class="flex-1 text-end"><?php echo $data['nama'] ?></span>
                    </div>
                    <div id="user-profile-nim" class="border-b border-black flex p-2">
                        <span>NIM</span>
                        <span class="flex-1 text-end"><?php echo $data['nim']; ?></span>
                    </div>
                    <div id="user-profile-jurusan" class="border-b border-black flex p-2">
                        <span>Jurusan</span>
                        <span class="flex-1 text-end"><?php echo $data['jurusan']; ?></span>
                    </div>
                    <div id="user-profile-prodi" class="border-b border-black flex p-2">
                        <span>Prodi</span>
                        <span class="flex-1 text-end"><?php echo $data['prodi']; ?></span>
                    </div>
                    <div id="user-profile-tel" class="border-b border-black flex p-2">
                        <span>No. Telp</span>
                        <span class="flex-1 text-end"><?php echo $data['telepon'];?></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="user-ganti-password" class="flex flex-col">
            <div id="user-ganti-password-header" class="mb-6">
                <h1 class="text-4xl font-semibold mb-6">Ganti Password</h1>
                <hr class="border border-black">
            </div>
            <div id="user-ganti-password-card"
                 class="self-center bg-neutral-color border-2 border[#C8C1C1] py-12 px-10 rounded-3xl w-3/4 mb-6">
                <form method="POST" class="flex flex-col gap-8">
                    <div class="flex gap-2 justify-between items-center">
                        <label>Password Sekarang</label>
                        <input type="password" name="password-sekarang" id="password-sekarang"
                               class="border border-black rounded-lg px-4 py-2 w-96" required>
                    </div>
                    <div class="flex gap-2 justify-between items-center">
                        <label>Password Baru</label>
                        <input type="password" name="password-baru" id="password-baru"
                               class="border border-black rounded-lg px-4 py-2 w-96 required">
                    </div>
                    <div class="flex gap-2 justify-between items-center">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi-password-baru" id="konfirmasi-password-baru"
                               class="border border-black rounded-lg px-4 py-2 w-96" required>
                    </div>
                    <button class="bg-third-color rounded-full px-10 py-2 text-neutral-color align-middle flex items-center self-end cursor-pointer hover:bg-primary-color" type="submit">
                        <span>Ganti</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>