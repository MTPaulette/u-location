<template>
  <header>
    <nav class="bg-transparent border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
      <div class="flex flex-wrap items-center justify-between mx-auto w-full">
        <a href="/" class="flex items-center">
          <!-- <img src="{{ Vite::asset('resources/images/logo.png') }}" class="h-9 mr-3 sm:h-12" alt="Agrimax Logo" /> -->
          <img src="./../../../images/logo.png" class="h-9 mr-3 sm:h-12" alt="Agrimax Logo" />
        </a>

        <div class="flex items-center md:order-2">
          <!-- search -->
          <div>
            <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
              <span class="sr-only">Search</span>
            </button>
            <div class="relative hidden md:block">
              <!-- search -->
              <SearchBar />
            </div>
          </div>

          <!-- user's info dropdown menu -->
          <LoggedUser :user="user" />

          <!-- toggle icon menu on small screen-->
          <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
          </button>
        </div>

        <!-- middle links menu -->
        <div id="navbar-search" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:justify-center">
          <div class="relative mt-3 md:hidden">
            <!-- search -->
            <SearchBar />
          </div>
          <ul class="flex flex-col p-4 mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
            <li v-for="(linkItem, i) in menuItems" :key="i">
              <!-- <Link href="/" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Accueil</Link> -->
              <a :href="linkItem[0]" class="block py-2 pl-3 pr-4 text-gray-900 rounded capitalize hover:bg-transparent hover:text-mango md:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ linkItem[1] }}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { initFlowbite } from 'flowbite'
// import { Link } from '@inertiajs/vue3'
import SearchBar from './tools/searchBar.vue'
import LoggedUser from './tools/loggedUser.vue'

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})

const menuItems = [['/','Acceuil'], ['/about','A propos'], ['/post','blog'], ['/contact','contact'], ['/market','marche'], ['/services','services']]


const user = ref({
  name: 'paulette',
  email: "paultte@myemail.com",
})


</script>
