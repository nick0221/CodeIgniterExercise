<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="rounded-lg bg-gray-800/50 p-6 shadow dark:shadow-none dark:bg-gray-800">
    <h1 class="text-2xl font-bold mb-2 dark:text-white">Users Page</h1>
    <p class="text-gray-400 dark:text-gray-300">
        CodeIgniter 4 CRUD Application Exercise.
    </p>
</div>


<div class="flex justify-between items-center mb-4 mt-14">
    <h1 class="text-3xl font-bold"><?= $title ?>
    </h1>
    <a href="<?= site_url('/users/create') ?>"
        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Add User</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
<div class="mb-4 p-2 bg-green-600 text-white rounded">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<div class="overflow-x-auto">
    <table class="min-w-full bg-gray-200 rounded shadow overflow-hidden">
        <thead class="bg-gray-300 text-left">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr class="border-t border-gray-700">
                <td class="px-4 py-2">
                    <?= $user['id'] ?>
                </td>
                <td class="px-4 py-2">
                    <?= esc($user['name']) ?>
                </td>
                <td class="px-4 py-2">
                    <?= esc($user['email']) ?>
                </td>
                <td class="px-4 py-2 flex gap-2" x-data="{ open: false }">
                    <a href="<?= site_url('/users/edit/'.$user['id']) ?>"
                        class="px-2 py-1 bg-yellow-500 rounded hover:bg-yellow-600">Edit</a>


                    <!-- Delete Button -->
                    <button @click="open = true" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

                        <div @click.outside="open = false" class="bg-gray-800 p-6 rounded shadow-lg w-full max-w-md">

                            <h2 class="text-xl font-bold mb-3 text-white">
                                Confirm Delete
                            </h2>

                            <p class="mb-5 text-gray-300">
                                Are you sure you want to delete
                                <span class="font-semibold text-white">
                                    <?= esc($user['name']) ?>
                                </span>?
                            </p>

                            <div class="flex justify-end gap-3">

                                <button @click="open = false" class="px-4 py-2 bg-gray-600 rounded hover:bg-gray-700">
                                    Cancel
                                </button>

                                <form
                                    action="<?= site_url('/users/delete/'.$user['id']) ?>"
                                    method="post">
                                    <?= csrf_field() ?>
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php if (empty($users)): ?>
            <tr>
                <td colspan="4" class="px-4 py-2 text-center text-gray-400 dark:text-gray-500">No users found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>



<?= $this->endSection() ?>