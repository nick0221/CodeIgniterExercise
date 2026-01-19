<nav x-data="{ mobileOpen: false }"
     class="relative z-50 bg-gray-800  border-b border-white/10">

  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">

      <!-- Mobile menu button -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button @click="mobileOpen = !mobileOpen"
          class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white">
          <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg x-show="mobileOpen" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Logo + Desktop menu -->
      <div class="flex flex-1 items-center justify-center sm:justify-start">
        <span class="text-indigo-400 font-bold text-lg">CI4 CRUD</span>

        <div class="hidden sm:ml-6 sm:flex space-x-4">
          <a href="<?= site_url('/') ?>" class="px-3 py-2 text-sm rounded-md   text-white hover:bg-white/5 hover:text-white">Dashboard</a>
          <a href="<?= site_url('/users') ?>" class="px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-white/5 hover:text-white">Users</a>
          <a href="<?= site_url('/products') ?>" class="px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-white/5 hover:text-white">Products</a>
        </div>
      </div>

      <!-- Profile dropdown -->
      <div x-data="{ open: false }" class="relative ml-3">
        <button @click="open = !open"
                class="flex rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <img class="h-8 w-8 rounded-full"
               src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" />
        </button>

        <div x-show="open"
             @click.outside="open = false"
             x-transition
             x-cloak
             class="absolute right-0 mt-2 w-48 rounded-md bg-gray-800 shadow-lg ring-1 ring-black/20">
          <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">Profile</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">Settings</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">Logout</a>
        </div>
      </div>

    </div>
  </div>

  <!-- Mobile menu -->
  <div x-show="mobileOpen"
       x-transition
       x-cloak
       class="sm:hidden bg-gray-900 border-t border-white/10">
    <div class="space-y-1 px-2 py-3">
      <a href="<?= site_url('/') ?>" class="block px-3 py-2 rounded-md bg-gray-950/50 text-white">Dashboard</a>
      <a href="<?= site_url('/users') ?>" class="block px-3 py-2 rounded-md text-gray-300 hover:bg-white/5 hover:text-white">Users</a>
      <a href="<?= site_url('/products') ?>" class="block px-3 py-2 rounded-md text-gray-300 hover:bg-white/5 hover:text-white">Products</a>
    </div>
  </div>

</nav>
