
<template>
  <!-- <nav class="fixed top-0 z-50 w-full bg-white border-b my-border-gray dark:bg-black"> -->
  <nav class="fixed top-0 z-50 w-full bg-white border-b my-border-gray dark:bg-gray-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
            </svg>
          </button>
          <a href="/home" class="flex ml-2 md:mr-24">
            <img src="./../../../images/logo.png" class="h-12 mr-3" alt="Agrimax Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl hidden sm:inline whitespace-nowrap text-sheet-100 dark:text-white">Agrimax</span>
          </a>
        </div>
        <div class="flex items-center">
          <!-- <div class="flex items-center ml-3"> -->
          <!-- search -->
          <div class="relative mr-2 sm:mr-3">
            <SearchBar />
          </div>
          <!-- dark mode toggle  -->
          <div class="mr-4 mt-2">
            <DarkMode />
          </div>
          <!-- notification -->
          <div class="mt-2">
            <Notification />
          </div>
          <!-- user's info dropdown menu -->
          <div>
            <LoggedUser />
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { onMounted } from 'vue'
import { initDropdowns } from 'flowbite'

import SearchBar from '@/Components/Navbar/tools/searchBar.vue'
import LoggedUser from '@/Components/Navbar/tools/loggedUser.vue'
import Notification from '@/Components/Navbar/tools/notification.vue'
import DarkMode from '@/Components/Navbar/tools/darkMode.vue'

// initialize components based on data attribute selectors
onMounted(() => {
  initDropdowns()
})

</script>