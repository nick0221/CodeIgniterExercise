<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="max-w-lg mx-auto bg-gray-800/50 p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4"><?= $title ?></h1>

    <!-- Validation Errors -->
    <?php if (session()->getFlashdata('errors')): ?>
    <div class="mb-4 p-3 bg-red-600 text-white rounded">
        <ul class="list-disc list-inside">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <form
        action="<?= site_url('/users/update/'.$user['id']) ?>"
        method="post" class="space-y-4">
        <?= csrf_field() ?>

        <div>
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name"
                value="<?= old('name', $user['name']) ?>"
                class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email"
                value="<?= old('email', $user['email']) ?>"
                class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        <div class="flex justify-between">
            <a href="<?= site_url('/users') ?>"
                class="px-4 py-2 bg-gray-600 rounded hover:bg-gray-700">
                Back
            </a>

            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Update
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>