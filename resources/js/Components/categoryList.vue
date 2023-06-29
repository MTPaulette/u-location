<template>
  <div>
    <div>
      <sectionTitle :title="title" />
    </div>
    <div>
      <ul class="flex flex-wrap text-gray-900 font-medium text-lg dark:text-gray-400 w-full h-[250px] over-y">
        <li 
          v-for="category in categories" 
          :key="category.id"
        >
          <span 
            class="bg-green-50 border border-green-200 hover:bg-sheet-200 hover:text-white hover:border-sheet-200 dark:border-gray-700 dark:text-gray-400 text-xs mr-2 px-2.5 py-0.5 rounded-full dark:bg-transparent dark:hover:bg-gray-600" 
            @click="research(category.id)"
          >
            {{ category.name }}
          </span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import sectionTitle from '@/Components/sectionTitle.vue'
import { useForm } from '@inertiajs/vue3'

defineProps({
  title: String,
  categories: Object,
})

const filterForm = useForm({
  category: null,
  q: null,
})

const research = (category_id) => {
  filterForm.category = category_id
  filterForm.get(
    route('product.filters'),
    {
      preserveState: true,
      preserveScroll: true,
    },
  )
}
</script>