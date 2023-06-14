<template>
  <div>
    <div>
      <sectionTitle :title="title" />
    </div>
    <div>
      <!-- <ul class="flex flex-wrap text-gray-900 font-medium text-lg dark:text-gray-400 w-full h-[250px] over-y"> -->
      <ul class="text-gray-900 font-medium text-lg dark:text-gray-400 w-full h-[350px] over-y">
        <li 
          v-for="list in lists" 
          :key="list.id"
          class="flex justify-between items-center text-sm mb-0.5 px-3 py-1 border-b-2 border-b-gray-100"
        >
          <!-- <span class="bg-green-50 border border-green-200 hover:bg-sheet-200 hover:text-white hover:border-sheet-200 dark:hover:bg-gray-500 dark:text-blue-400 text-xs mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700"> -->
          <!--<span class="bg-green-50 border border-green-200 dark:text-blue-400 cursor-text text-sm mb-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700" -->
          
          <span>{{ list.name }}</span>
          <span class="hover:text-red-500" @click="$emit('delete', list.id);">
            <!-- <Link :href="route('dashboard.product.image.destroy', {product: product.id, image: image.id})" method="DELETE" as="btn" class="hover:text-red-500"> -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 21 21">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
            <!-- </Link> -->
          </span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import sectionTitle from '@/Components/sectionTitle.vue'

defineProps({
  title: String,
  lists: Object,
})
</script>