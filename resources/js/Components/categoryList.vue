<template>
  <div>
    <div>
      <sectionTitle :title="title" />
    </div>
    <div>
      <ul class="flex flex-wrap text-gray-900 font-medium text-lg dark:text-gray-400 w-full h-[250px] over-y">
        <li 
          v-for="theme in themes" 
          :key="theme.id"
        >
          <Link :href="route('PostsByTheme', {theme: theme})" class="bg-green-50 border border-green-200 hover:bg-sheet-200 hover:text-white hover:border-sheet-200 dark:hover:bg-gray-500 dark:text-blue-400 text-xs mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700">
            {{ theme.title }}
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