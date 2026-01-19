<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= esc($title ?? 'CI4 CRUD App') ?>
    </title>

    <!-- <link rel="stylesheet"
        href="<?= base_url('css/style.css') ?>">
    -->


    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <!-- Optional Tailwind config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb'
                    }
                }
            }
        }
    </script>

</head>

<body class="bg-gray-100 text-gray-800">
    <?= $this->include('partials/header') ?>

    <main class="container mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 my-6">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('partials/footer') ?>

</body>

</html>