<template>
  <header>
    <nav class="w-full px-3 sm:px-4 py-14 rounded border-gray-300 dark:bg-gray-800 bg-white">
      <div class="flex flex-wrap items-center justify-start mx-auto w-full">
        <div class="flex items-center justify-between w-full">
          <a href="/home" class="flex items-center">
            <img src="./../../../images/logo.png" class="h-16 -mt-6 sm:h-[80px]" alt="Agrimax Logo" />
          </a>

          <div class="w-1/2 hidden sm:block">
            <SearchCategory />
          </div>

          <div class="flex items-center text-gray-900">
            <div class="mr-4 mt-2">
              <DarkMode />
            </div>

            <!-- notification -->
            <div class="mt-2 mr-2">
              <Notification />
            </div>

            <div class="hover:text-sheet-200">
              <Pannier />
            </div>


            <!-- user's info dropdown menu -->
            <div>
              <LoggedUser />
            </div>
            <!-- toggle icon menu on small screen-->
            <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
              <span class="sr-only">Open menu</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
            </button>
          </div>
        </div>

        <!-- middle links menu -->
        <div class="block bg-mango sm:hidden w-full">
          <div id="navbar-search" class="items-center justify-between hidden w-full bg-black mt-2 py-2 md:flex md:w-auto md:order-1 md:justify-center">
            <ul class="flex flex-col w-full px-4 md:flex-row md:space-x-8 md:mt-0 text-base md:text-base md:font-medium">
              <li v-for="(linkItem, i) in menuItems" :key="i" class="w-full py-0.5 sm:py-0 h-auto sm:h-16 px-4 flex items-center hover:bg-sheet-200 text-gray-100 dark:text-gray-400">
                <!-- <Link href="/home" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Accueil</Link> 
                  :class="{'active-navbar-link': $page.url.startsWith(linkItem[0])}" class="block w-full py-2 pl-3 pr-4 whitespace-nowrap text-gray-100 capitalize hover:bg-transparent md:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                -->
                <Link
                  :href="linkItem[0]"
                  :class="{'active-navbar-link': $page.url.startsWith(linkItem[0])}" class="block w-full py-2 pl-3 pr-4 whitespace-nowrap capitalize md:p-0 hover:text-white"
                >
                  {{ linkItem[1] }}
                </Link>
              </li>
            </ul>
          </div>
        </div>
        <div class="w-full mt-7 block sm:hidden">
          <SearchCategory id="dropdown2" />
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
import SearchCategory from '@/Components/searchCategory.vue'
import Pannier from '@/Components/Navbar/tools/pannier.vue'
import LoggedUser from '@/Components/Navbar/tools/loggedUser.vue'
import DarkMode from '@/Components/Navbar/tools/darkMode.vue'
import Notification from '@/Components/Navbar/tools/notification.vue'
import { initFlowbite } from 'flowbite'
import { Link } from '@inertiajs/vue3'
import { onMounted } from 'vue'
// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})

const menuItems = [['/home','Acceuil'], ['/about','A propos'], ['/post','blog'], ['/contact','contact'], ['/#','services'], ['/product','store']]

</script>

<style scoped>
#category-dropdown {
  overflow-y: scroll;
}

#category-dropdown::-webkit-scrollbar{
  width: 5px;
}

#category-dropdown::-webkit-scrollbar-track{
  box-shadow: inset 0 0 6px #FFF;
}

#category-dropdown::-webkit-scrollbar-thumb{
  outline: 1px solid #C4C4C4;
  background: #C4C4C4;
  border-radius: 8px;
}

.main {
  background-image: url('./../../../images/mango1.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>