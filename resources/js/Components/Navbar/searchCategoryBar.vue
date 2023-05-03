<template>
  <div class="w-full px-2 sm:px-4 py-12 rounded border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between mx-auto w-full">
      <a href="/" class="flex items-center">
        <!-- <img src="{{ Vite::asset('resources/images/logo.png') }}" class="h-9 mr-3 sm:h-12" alt="Agrimax Logo" /> -->
        <img src="./../../../images/logo.png" class="h-9 -mt-6 sm:h-[80px]" alt="Agrimax Logo" />
      </a>

      <div class="w-1/2">
        <SearchCategory />
      </div>

      <div class="flex items-center text-gray-800 hover:text-gray-900">
        <div class="mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
        </div>
        <div>
          <Pannier />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import SearchCategory from '@/Components/searchCategory.vue'
import Pannier from '@/Components/Navbar/tools/pannier.vue'

</script>
