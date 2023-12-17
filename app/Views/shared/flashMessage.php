<?php
function renderFlashMessage($flashMessage): string
{
    $type = $flashMessage['type'];
    $color = $flashMessage['color'];
    $message = $flashMessage['message'];
    $title = ($type == 'error' || $type == 'warn') ? 'Peringatan' : 'Berhasil';

    return <<<HTML
<section class="flash-message" id="customContainer">
    <div class="flash-message-$type bg-$color-color p-3 rounded-xl" id="custom$type">
        <div class="custom--warning-content-text">
            <h3 class="text-center text-xl">$title</h3>
            <p class="text-center">$message</p>
        </div>
    </div>
</section>
HTML;
}

$flashMessage = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);

echo $flashMessage !== null ? renderFlashMessage($flashMessage) : '';
