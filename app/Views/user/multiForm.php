<?php
namespace OrangDalam\PeminjamanRuangan\Views\shared;

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

        include __DIR__ . '/../shared/flashMessage.php';

        include $contentFile;

        ?>
    </div>
</body>

</html>
