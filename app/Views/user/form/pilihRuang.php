<div class="bg-[#E3E3E3] flex flex-col px-12 py-6 w-4/5 mt-8 rounded-3xl drop-shadow-xl shadow-md shadow-[#00000025] border-2 border-fourth-color overflow-x-auto">
    <div id="indikator" class="flex w-4/5 gap-8">
        <div id="kosong" class="flex items-center gap-2">
            <div class="rounded-full bg-disable-color w-5 h-5"></div>
            <span class="font-bold">Kosong</span>
        </div>
        <div id="digunakan" class="flex items-center gap-2">
            <div class="rounded-full bg-locked-color w-5 h-5"></div>
            <span class="font-bold">Digunakan</span>
        </div>
    </div>
    <div id="denah"
         class="flex justify-between overflow-x-auto">
        <?php
        $lantai7 = array(
            array(
                array(
                    "LPR 1" => "locked", "LPR 3" => "disable", "LPR 5" => "disable", "LKJ 1" => "locked"
                ), array("LPR 2" => "disable", "LPR 4" => "disable", "LPR 6" => "locked", "LPR 7" => "locked")
            ),
            array(
                array(
                    "LKJ 2" => "disable", "LKJ 3" => "disable", "RT 8" => "disable", "LERP" => "locked"
                ), array("LPR 8" => "disable", "LIG 1" => "disable", "LIG 2" => "locked", "LAI" => "locked")
            )
        );

        foreach ($lantai7 as $areaRuangan) {
            echo renderAreaRuangan($areaRuangan);
        }

        function renderAreaRuangan(array $areaRuangan): string
        {
            $html = '<div class="flex flex-col gap-12 justify-between py-20">';

            foreach ($areaRuangan as $ruangan) {
                $html .= '<div class="flex gap-8 px-8 flex-auto">';
                $html .= renderRuangan($ruangan);
                $html .= '</div>';
            }

            $html .= '</div>';

            return $html;
        }

        function locked(string $background): string
        {
            if ($background !== "locked") {
                return 'cursor-pointer hover:scale-105';
            }
            return '';
        }

        function renderRuangan(array $ruangan): string
        {
            $html = '';

            foreach ($ruangan as $ruang => $background) {
                $html .= '
            <a class="flex flex-col items-center justify-center bg-' . $background . '-color rounded-xl py-5 px-7 ' . locked($background) . '">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.8438 33.4062H32.1875V6.59375C32.1875 5.94728 31.9307 5.3273 31.4736 4.87018C31.0165 4.41306
                        30.3965 4.15625 29.75 4.15625H10.25C9.60353 4.15625 8.98355 4.41306 8.52643 4.87018C8.06931 5.3273
                        7.8125 5.94728 7.8125 6.59375V33.4062H4.15625C3.83302 33.4062 3.52302 33.5347 3.29446 33.7632C3.0659
                        33.9918 2.9375 34.3018 2.9375 34.625C2.9375 34.9482 3.0659 35.2582 3.29446 35.4868C3.52302 35.7153
                        3.83302 35.8438 4.15625 35.8438H35.8438C36.167 35.8438 36.477 35.7153 36.7055 35.4868C36.9341 35.2582
                        37.0625 34.9482 37.0625 34.625C37.0625 34.3018 36.9341 33.9918 36.7055 33.7632C36.477 33.5347 36.167
                        33.4062 35.8438 33.4062ZM10.25 6.59375H29.75V33.4062H10.25V6.59375ZM26.0938 20.6094C26.0938 20.9709
                        25.9865 21.3244 25.7857 21.625C25.5848 21.9257 25.2993 22.16 24.9652 22.2983C24.6312 22.4367 24.2636
                        22.4729 23.909 22.4024C23.5544 22.3318 23.2286 22.1577 22.9729 21.9021C22.7173 21.6464 22.5432 21.3206
                        22.4726 20.966C22.4021 20.6114 22.4383 20.2438 22.5767 19.9098C22.715 19.5757 22.9493 19.2902 23.25
                        19.0893C23.5506 18.8885 23.9041 18.7812 24.2656 18.7812C24.7505 18.7812 25.2155 18.9739 25.5583
                        19.3167C25.9011 19.6595 26.0938 20.1245 26.0938 20.6094Z" fill="white" />
                </svg>
                <nobr class="text-neutral-color font-semibold">' . $ruang . '</nobr>
            </a>';
            }

            return $html;
        }

        ?>
    </div>
    <div id="buttons" class="flex justify-evenly">
        <a class="py-2 px-6 bg-danger-color text-neutral-color rounded-3xl cursor-pointer"
           href="javascript:history.back()">Kembali</a>
        <button onclick="window.location.href='/pinjam/form?step=4&category=acara'" class="py-2 px-8 bg-third-color text-neutral-color rounded-3xl cursor-pointer"
                type="submit">Lanjut
        </button>
    </div>
</div>
<script>
    const ruangan = document.querySelectorAll('.bg-disable-color');

    ruangan.forEach((ruang) => {
        ruang.addEventListener("click", () => {
            ruang.classList.toggle('bg-disable-color');
            ruang.classList.toggle('bg-select-color')
        });
    });
</script>