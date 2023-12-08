<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>

<body class="h-screen overflow-hidden">
<div id="Peminjaman" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div id="Peminjaman-content" class="h-screen w-screen px-8 py-20 flex flex-col gap-12 ml-32">
        <div id="header">
            <div id="head" class="flex justify-between mb-6">
                <h1 class="text-4xl font-semibold">Pinjam Ruangan</h1>
                <a class="bg-third-color rounded-full px-10 text-neutral-color align-middle flex items-center cursor-pointer hover:bg-primary-color"
                   href="/pinjam/form">
                    <span>Pinjam</span>
                </a>
            </div>
            <hr class="border border-black">
        </div>
        <div class="flex-auto flex flex-col gap-3 overflow-y-auto">
            <!--            <span class="text-xl font-medium">Belum ada Peminjaman</span>-->
            <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex w-full justify-between">
                    <span class="text-neutral-color px-3 py-1 bg-warn-color rounded-xl">Menunggu Konfirmasi</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="font-bold text-3xl">LPR 8, LIG 1</span>
                    <span class="font-normal text-xl">Digunakan Tanggal 30 Februari 2023</span>
                </div>
                <div class="self-end flex gap-5">
                    <button class="font-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
                        Detail
                        Peminjaman
                    </button>
                </div>
            </div>
            <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex w-full justify-between">
                    <span class="text-neutral-color px-3 py-1 bg-danger-color rounded-xl">Diperlukan Surat Izin</span>
                    <span class="text-danger-color text-lg font-semibold">*Upload Surat Sebelum 1 Maret 2023</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="font-bold text-3xl">LPR 8, LIG 1</span>
                    <span class="font-normal text-xl">Digunakan Tanggal 30 Februari 2023</span>
                </div>
                <div class="self-end flex gap-5">
                    <button id="upload-surat-izin"
                            class="font-bold text-sm px-3 py-2 bg-select-color rounded-3xl text-[#ffffff] hover:bg-[#27BD63]">
                        Upload Surat Izin
                    </button>
                    <button class="font-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
                        Detail
                        Peminjaman
                    </button>
                </div>
            </div>
            <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex w-full justify-between">
                    <span class="text-neutral-color px-3 py-1 bg-select-color rounded-xl">Telah Dikonfirmasi</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="font-bold text-3xl">LPR 8, LIG 1</span>
                    <span class="font-normal text-xl">Digunakan Tanggal 30 Februari 2023</span>
                </div>
                <div class="self-end flex gap-5">
                    <button class="font-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
                        Detail
                        Peminjaman
                    </button>
                </div>
            </div>
            <div class="flex flex-col border-2 border-[#7B7777] items-start p-5 rounded-xl gap-4 shadow-[0_4px_4px_0px_#00000025]">
                <div class="flex w-full justify-between">
                    <span class="text-neutral-color px-3 py-1 bg-warn-color rounded-xl">Menunggu Konfirmasi</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="font-bold text-3xl">LPR 8, LIG 1</span>
                    <span class="font-normal text-xl">Digunakan Tanggal 30 Februari 2023</span>
                </div>
                <div class="self-end flex gap-5">
                    <button class="font-bold text-sm px-3 py-2 bg-third-color rounded-3xl text-neutral-color hover:bg-primary-color">
                        Detail
                        Peminjaman
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="upload-surat-modal" class="modal hidden fixed inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div id="surat-modal-overlay" class="absolute w-full h-full bg-gray-800 opacity-50"></div>
            <div class="bg-white py-7 px-28 gap-10 shadow-lg rounded-3xl z-20 flex flex-col items-center">
                <span class="font-semibold text-3xl">Upload Surat</span>
                <form class="flex flex-col gap-12">
                    <div class="flex flex-col gap-2">
                        <label for="surat">Upload Surat Peminjaman</label>
                        <input type="file" name="surat" id="surat"
                               class="px-5 py-2 rounded-lg border border-primary-color" required>
                    </div>
                    <div class="flex justify-evenly">
                        <button type="button" id="close-surat-modal"
                                class="bg-danger-color px-10 py-3 text-neutral-color font-semibold text-sm rounded-3xl">
                            Tutup
                        </button>
                        <input type="submit"
                               class="bg-select-color px-10 py-3 text-neutral-color cursor-pointer font-semibold text-sm rounded-3xl">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const modal = document.getElementById('upload-surat-modal');
    const openModalBtn = document.getElementById('upload-surat-izin');
    const closeModalBtn = document.getElementById('close-surat-modal');
    const overlay = document.getElementById('surat-modal-overlay');

    const openModal = () => modal.classList.remove('hidden');
    const closeModal = () => modal.classList.add('hidden');

    openModalBtn.onclick = openModal;
    closeModalBtn.onclick = closeModal;
    overlay.onclick = closeModal;

    window.onclick = (e) => {
        if (e.target === modal) {
            closeModal();
        }
    };

</script>
</body>

</html>