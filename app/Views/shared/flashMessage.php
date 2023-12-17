<?php
function renderFlashMessage($flashMessage): string
{
    $type = $flashMessage['type'];
    $color = $flashMessage['color'];
    $message = $flashMessage['message'];

    return <<<HTML
<section class="flash-message" id="customContainer">
    <div class="flash-message-$type bg-$color-color p-3 rounded-xl" id="custom$type">
        <div class="custom--warning-content-text">
            <p class="text-center text-white font-bold">$message</p>
        </div>
    </div>
</section>
HTML;
}

$flashMessage = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);

echo $flashMessage !== null ? renderFlashMessage($flashMessage) : '';
