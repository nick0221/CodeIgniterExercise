<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'CI4 CRUD App') ?>
    </title>

    <link rel="stylesheet"
        href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <?= $this->include('partials/header') ?>
    <?= $this->include('partials/navbar') ?>

    <main class="container">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('partials/footer') ?>

</body>

</html>