<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../shared/head.php'; ?>
</head>
<body class="font-plus-jakarta-sans">
<div id="Multi-form" class="h-screen flex flex-row">
    <?php include 'sidebar.php'; ?>
    <div class="h-screen w-screen flex flex-col gap-4">
        <?php include 'stepper.php'; ?>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let checkbox = document.getElementById("urgent");
        let uploadSection = document.getElementById("bukti");

        checkbox.addEventListener("change", () => {
            uploadSection.style.display = checkbox.checked ? "flex" : "none";
        });

        uploadSection.style.display = checkbox.checked ? "flex" : "none";
    });
</script>
</body>

</html>
