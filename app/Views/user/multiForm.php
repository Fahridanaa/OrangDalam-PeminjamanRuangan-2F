<?php
namespace OrangDalam\PeminjamanRuangan\Views\shared;

$flashMessage = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body class="font-plus-jakarta-sans">
<div id="Multi-form" class="h-screen flex">
    <?php include 'sidebar.php'; ?>
    <div class="h-screen w-screen flex flex-col gap-6 items-center ml-32">
        <?php include 'stepper.php';

        include $contentFile;

        ?>
        <?php if (!is_null($flashMessage)): ?>
            <div class="<?= $flashMessage['type'] ?> flex justify-center bg-<?= $flashMessage['color'] ?>-color mt-4 rounded-xl py-2 relative w-full">
                <span class="text-xl text-center"><?= $flashMessage['message'] ?></span>
            </div>
        <?php endif; ?>

    </div>
</body>

</html>
