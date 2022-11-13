<!DOCTYPE html>
<html lang="en">

<?= $this->include("temp/layout/head"); ?>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <?= $this->include("/temp/layout/sidebar"); ?>

    <main class="main-content position-relative border-radius-lg">
        <!-- Navbar -->
        <?= $this->include("/temp/layout/navbar"); ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <?= $this->renderSection("content"); ?>

            <?= $this->include("temp/layout/footer"); ?>
        </div>
    </main>
    <?= $this->include("temp/layout/script"); ?>

    <?= $this->renderSection("script"); ?>
</body>

</html>