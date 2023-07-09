<template>
  <header>
    <nav class="px-2 sm:px-4 py-2.5 sm:py-0 h-auto sm:h-16 bg-black">
      <div class="flex items-center justify-start mx-auto w-full">
        <div class="flex items-center justify-between sm:justify-start w-full sm:w-auto">
          <div>
            <label for="category-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">categories</label>
            <button id="category-button" data-dropdown-toggle="category-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 sm:py-0 h-auto sm:h-16 px-2 md:px-4 text-base font-semibold uppercase text-center text-white bg-mango hover:bg-sheet-200 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700" type="button">
              <div class="w-[142px] truncate h-5">
                <span v-if="filterForm.category">{{ filterForm.category }}</span>
                <span v-else>All categories</span>
              </div>
              <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
            <div id="category-dropdown" class="z-10 bg-white hidden divide-y divide-gray-100 shadow-lg w-48 h-[350px] dark:bg-gray-700">
              <!-- <div id="category-dropdown" ref="dropCategories" class="z-10 bg-white hidden divide-y divide-gray-100 shadow-lg w-48 h-[350px] dark:bg-gray-700"> -->
              <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="category-button">
                <li
                  v-for="category in categories" 
                  :key="category.id"
                  class="border-b my-border-gray"
                >
                  <span
                    class="block px-4 py-2.5 hover:text-white hover:bg-sheet-200 dark:hover:bg-gray-600 dark:hover:text-white"
                    @click="research(category)"
                  >
                    {{ category.name }}
                  </span>
                </li>
              </ul>
            </div>
          </div>
          <!-- toggle icon menu on small screen-->
          <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
          </button>
        </div>

        <!-- middle links menu -->
        <div id="navbar-search" class="items-center justify-between hidden w-full sm:flex sm:w-auto sm:order-1 sm:justify-center">
          <ul class="flex flex-col px-4 sm:flex-row sm:space-x-6 md:space-x-8 sm:mt-0 sm:text-sm sm:font-medium">
            <li v-for="(linkItem, i) in menuItems" :key="i" class="py-2.5 sm:py-0 h-auto sm:h-16 flex items-center hover:bg-sheet-200">
              <a :href="linkItem[0]" class="block py-2 pl-3 pr-4 whitespace-nowrap text-gray-100 capitalize hover:bg-transparent sm:p-0  px-0 sm:px-1 md:px-2 lg:px-4 sm:h-full sm:inline-flex sm:items-center sm:justify-center text-center dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:dark:hover:bg-transparent">{{ linkItem[1] }}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
import { onMounted } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import { initFlowbite } from 'flowbite'
import { computed } from 'vue'
// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})

const page = usePage()

const categories = computed(
  () => page.props.categories,
)

// const dropCategories = ref(null)

const filterForm = useForm({
  category: null,
  q: null,
})

const research = (category) => {
  filterForm.category = category.name
  filterForm.get(
    route('product.filters'),
    {
      preserveState: true,
      preserveScroll: true,
    },
  )
  // dropCategories.value.hide()
}

const menuItems = [['/','Acceuil'], ['/about','A propos'], ['/post','blog'], ['/contact','contact'], ['/#','services'], ['/product','store']]

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
