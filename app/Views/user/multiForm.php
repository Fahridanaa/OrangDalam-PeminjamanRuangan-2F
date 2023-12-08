<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body class="font-plus-jakarta-sans">
<div id="Multi-form" class="h-screen flex">
    <?php include 'sidebar.php'; ?>
    <div class="h-screen w-screen flex flex-col gap-6 items-center">
        <?php include 'stepper.php'; ?>
        <?php include __DIR__ . '/form/acara.php'; ?>
    </div>
</body>

</html>
