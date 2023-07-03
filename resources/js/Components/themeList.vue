<template>
  <div>
    <div>
      <sectionTitle :title="title" />
    </div>
    <!-- <div>
      <ul class="flex flex-wrap text-gray-900 font-medium text-lg dark:text-gray-400 w-full h-[250px] over-y">
        <li 
          v-for="theme in themes" 
          :key="theme.id"
        >
          <Link :href="route('PostsByTheme', {theme: theme})" class="bg-green-50 border border-green-200 hover:bg-sheet-200 hover:text-white hover:border-sheet-200 dark:border-gray-700 dark:text-gray-400 text-xs mr-2 px-2.5 py-0.5 rounded-full dark:bg-transparent dark:hover:bg-gray-600">
            {{ theme.name }}
          </Link>
        </li>
      </ul>
    </div> -->
    <div class="content">
      <!-- <ul class="flex flex-wrap text-gray-900 font-medium text-lg dark:text-gray-400 w-full h-[250px] over-y"> 
           link  class="bg-green-50 border border-green-200 hover:bg-sheet-200 hover:text-white hover:border-sheet-200 dark:border-gray-700 dark:text-gray-400 text-xs mr-2 px-2.5 py-0.5 rounded-full dark:bg-transparent dark:hover:bg-gray-600"
        -->
      <ul class="text-gray-900 dark:text-gray-400 w-full h-[250px] over-y">
        <li 
          v-for="theme in themes" 
          :key="theme.id"
        >
          <!-- class="dark:hover:text-gray-200 hover:text-gray-500 text-base leading-3" -->
          <Link 
            :href="route('PostsByTheme', {theme: theme})" 
            class="hover:text-sheet-50 text-base md:text-sm leading-3"
          >
            {{ theme.name }}
          </Link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import sectionTitle from '@/Components/sectionTitle.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  title: String,
  themes: Object,
})
</script>