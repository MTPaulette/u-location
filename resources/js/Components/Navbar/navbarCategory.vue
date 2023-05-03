<template>
  <header>
    <nav class="px-2 sm:px-4 py-2.5 sm:py-0 h-auto sm:h-16 bg-black">
      <div class="flex flex-wrap items-center justify-start mx-auto w-full">
        <div class="flex items-center justify-between sm:justify-start w-full sm:w-auto">
          <div>
            <label for="category-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">categories</label>
            <button id="category-button" data-dropdown-toggle="category-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 sm:py-0 h-auto sm:h-16 px-4 text-base font-semibold uppercase text-center text-white bg-mango hover:bg-sheet-200 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700" type="button">
              All categories
              <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
            <div id="category-dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 shadow-lg w-48 h-[350px] dark:bg-gray-700">
              <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="category-button">
                <li class="border-b border-gray-200 dark:border-gray-700">
                  <!-- <a href="#" class="block px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Shopping</a> -->
                  <a href="#" class="block px-4 py-2.5 hover:text-white hover:bg-sheet-200 dark:hover:bg-gray-600 dark:hover:text-white">Shopping</a>
                </li>
                <li class="border-b border-gray-200 dark:border-gray-700">
                  <a href="#" class="block px-4 py-2.5 hover:text-white hover:bg-sheet-100 dark:hover:bg-gray-600 dark:hover:text-white">Images</a>
                </li>
                <li class="border-b border-gray-200 dark:border-gray-700">
                  <a href="#" class="block px-4 py-2.5 hover:text-white hover:bg-sheet-100 dark:hover:bg-gray-600 dark:hover:text-white">News</a>
                </li>
                <li class="border-b border-gray-200 dark:border-gray-700">
                  <a href="#" class="block px-4 py-2.5 hover:text-white hover:bg-sheet-100 dark:hover:bg-gray-600 dark:hover:text-white">Finance</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- toggle icon menu on small screen-->
          <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
          </button>
        </div>

        <!-- middle links menu -->
        <div id="navbar-search" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:justify-center">
          <ul class="flex flex-col px-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
            <li v-for="(linkItem, i) in menuItems" :key="i" class="py-2.5 sm:py-0 h-auto sm:h-16 px-4 flex items-center hover:bg-sheet-200">
              <!-- <Link href="/" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Accueil</Link> -->
              <a :href="linkItem[0]" class="block py-2 pl-3 pr-4 text-gray-100 capitalize hover:bg-transparent md:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ linkItem[1] }}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})

const menuItems = [['/','Acceuil'], ['/about','A propos'], ['/post','blog'], ['/contact','contact'], ['/market','marche'], ['/services','services']]

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
</style>
