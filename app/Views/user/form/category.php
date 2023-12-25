<div class="border mx-auto p-12 flex flex-col justify-between border-black rounded-3xl gap-12 shadow-[0_4px_4px_0px_#00000025]">
    <h1 class="text-center font-semibold text-2xl font-plus-jakarta-sans">Pilih Kategori Peminjaman</h1>
    <div class="flex justify-center gap-16">
        <form action="/pinjam/form?step=1" method="POST">
            <button type="submit" name="category" value="acara"
                    class="flex flex-col justify-center items-center bg-primary-color rounded-xl p-10 cursor-pointer hover:scale-105 ease-in-out transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" stroke-width=".5"
                     stroke="#2E4374" class="w-32 h-32">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z"/>
                </svg>

                <span class="text-neutral-color font-medium text-xl">Acara / Kegiatan</span>
            </button>
        </form>
        <form action="/pinjam/form?step=1" method="POST">
            <button type="submit" name="category" value="matkul"
                    class="flex flex-col justify-center items-center bg-<?= ($_SESSION['user']['ketua'] != null) ? 'noFocus' : 'primary' ?>-color rounded-xl p-10 cursor-not-allowed"
                <?= ($_SESSION['user']['ketua'] != null) ? 'disabled' : '' ?>>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" stroke-width="2"
                     stroke="#666666" class="w-32 h-32">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                </svg>
                <span class="text-neutral-color font-medium text-xl">Pindah Mata Kuliah</span>
            </button>
        </form>
    </div>
</div>