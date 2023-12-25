<?php
namespace OrangDalam\PeminjamanRuangan\Views\shared;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body class="font-plus-jakarta-sans">
<?php include __DIR__ . '/../shared/flashMessage.php'; ?>
<div id="Multi-form" class="h-screen flex">
    <?php include 'sidebar.php'; ?>
    <div class="min-h-screen max-w-full flex flex-col flex-auto gap-6 items-center ml-32">
        <?php include 'stepper.php';
        include $contentFile;
        ?>
    </div>
</body>

</html>
