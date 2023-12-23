<?php
$flashMessage = $_SESSION['flash_message'] ?? null;

function renderFlashMessage($flashMessage): string
{
    $type = $flashMessage['type'] ?? '';
    $color = $flashMessage['color'] ?? '';
    $message = $flashMessage['message'] ?? '';

    return <<<HTML
<section class="flash-message absolute w-full flex flex-col items-center z-20 opacity-0" id="customContainer">
    <div class="flash-message-$type bg-$color-color p-3 rounded-xl" id="custom$type">
        <div class="flash-message-content-text">
            <p class="text-center text-white font-bold">$message</p>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const flashMessageContainer = document.getElementById('customContainer');
        const flashMessageStatus = localStorage.getItem('flashMessageStatus');

        if (flashMessageContainer && flashMessageStatus !== 'shown') {
            flashMessageContainer.style.transition = "all .3s ease";
            flashMessageContainer.style.transform = "translateY(-3rem)";
            flashMessageContainer.style.opacity = "1";
            
            void flashMessageContainer.offsetWidth;

            flashMessageContainer.style.transform = "translateY(2rem)";
            
            sessionStorage.setItem('flashMessageStatus', 'shown');

            setTimeout(function() { 
                flashMessageContainer.style.transform = "translateY(-3rem)";
                flashMessageContainer.style.opacity = "0";

                setTimeout(function() { flashMessageContainer.remove(); }, 150);
            }, 2000);
        }
    });
</script>
HTML;
}

unset($_SESSION['flash_message']);

echo renderFlashMessage($flashMessage);
?>