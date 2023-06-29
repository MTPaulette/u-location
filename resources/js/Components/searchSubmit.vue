<template>
  <form action="" class="flex justify-center">
    <div class="relative w-full max-w-[575px]">
      <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
        <input id="search" type="search" class="pl-4 input-search bg-mango" placeholder="Search" required />

        <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-green-700 rounded-r-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
          <svg aria-hidden="true" class="w-4 h-4 text-white dark:text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
      </div>
    </div>
  </form>
</template>