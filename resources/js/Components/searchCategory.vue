<template>
  <form class="flex max-w-full justify-center" @submit.prevent="research">
    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">categories</label>
    <button id="dropdown-button" :data-dropdown-toggle="id" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-3 md:px-5 text-sm font-medium text-center text-gray-900 bg-gray-100 border my-border-gray dark:text-white rounded-l-md hover:bg-gray-200 dark:bg-gray-600 dark:hover:bg-gray-700" type="button">
      <div class="w-20 truncate h-5">
        <!-- <span v-if="filterForm.category"><span v-if="selectedCategory['name']">{{ selectedCategory['name'] }}</span></span> -->
        <span v-if="filterForm.category">{{ selectedCategory }}</span>
        <span v-else>All categories</span>
      </div>
      <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>
    <div :id="id" class="over-y z-10 hidden bg-gray-50 divide-y divide-gray-100 shadow-lg w-36 h-[170px] dark:bg-gray-700">
      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
        <li class="border-b my-border-gray">
          <span class="block px-4 py-2 hover:text-white hover:bg-sheet-200 dark:hover:bg-gray-600 dark:hover:text-white" @click="reset">
            <button type="reset">aucune categorie</button>
          </span>
        </li>
        <li v-for="category in categories" :key="category.id" class="border-b my-border-gray">
          <span class="block px-4 py-2 hover:text-white hover:bg-sheet-200 dark:hover:bg-gray-600 dark:hover:text-white" @click="setCategory(category)">
            {{ category.name }}
          </span>
        </li>
      </ul>
    </div>
    <div class="relative w-full">
      <input id="search-dropdown" v-model="filterForm.q" type="search" class="block p-4 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-md border-l-gray-100 border-l-2 border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-green-500" placeholder="Search Product here ..." />
      <button type="submit" class="absolute top-0 right-0 p-4 text-sm font-medium text-white bg-green-700 rounded-r-md border border-green-700 hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg></button>
    </div>
  </form>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3'

const page = usePage()
const filters =  page.props.filters
let selectedCategory = page.props.category

defineProps({
  categories: Object,
  id: {
    type: String,
    default: "dropdown",
  },
})

const filterForm = useForm({
  category: filters['category']??null,
  q: filters['q']??null,
})

const research = () => {
  filterForm.get(
    route('product.filters'),
    {
      preserveState: true,
      preserveScroll: true,
    },
  )
}

const setCategory = (category) => {
  selectedCategory = category.name
  filterForm.category = category.id
}

const reset = () => {
  filterForm.category = null
  filterForm.q = null
  selectedCategory = null
  research()
}

</script>