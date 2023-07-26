<template>
  <div class="w-full px-4 py-3 mb-2 shadow">
    <!-- <div class="border-0 my-border-gray border-r border-red-100 w-full px-4 py-3 mb-2 hover:bg-black/10 dark:hover:bg-black/25"> -->
    <div class="my-border-gray border-b border-red-100 pb-3 mb-1">
      <div class="flex-shrink-0 relative flex justify-center">
        <img class="rounded w-20 lg:w-26 h-20 sm:h-26" src="./../../images/pdf.png" alt="order image" />
        <!-- <div class="absolute right-0 top-0 w-full h-full rounded bg-black/50 dark:bg-black/75 hover:bg-transparent dark:hover:bg-transparent" /> -->
      </div>
    </div>
            
    <div class="w-full mb-2">
      <div class="w-full flex justify-between items-center">
        <h4 class="w-full truncate font-semibold dark:text-gray-200 capitalize text-lg leading-5">{{ order.name }}</h4>
        <div class="flex gap-x-2"> 
          <Link :href="route('order.show', {order: order.id})" class="text-gray-600 text-sm dark:text-gray-400 hover:text-sheet-50 dark:hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">  
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
          </Link>
          <a
            :href="'export/order/'+order.id" 
            class="text-red-600 text-sm dark:text-gray-400 hover:text-sheet-50 dark:hover:text-white"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">  
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
            </svg>
          </a>
        </div>
      </div>
      <!-- <div v-if="order.weights[0]">
        <div class="flex justify-between items-center font-semibold text-sm">
          <p class="whitespace-nowrap">{{ order.weights[0].name }}</p>
          <p v-if="order.weights[0].pivot" class="text-sheet-50 whitespace-nowrap">{{ formatPrice(order.weights[0].pivot.price) }}</p>
        </div>
        <p v-if="order.weights[0].pivot.remaining_stock == 0"><span class="text-danger text-xs">not available</span></p>
      </div> -->
    </div>
    <!-- <div>
      <div class="h-10 md:h-8 overflow-hidden bg-pink-4000 text-justify text-sm leading-4 md:text-xss mb-0.5 text-gray-700 dark:text-gray-400">
        <p class="content" v-html="order.description" />
      </div>
  

      <p class="truncate w-full text-xs md:text-[10px] text-gray-600 dark:text-gray-400">categorie: {{ order.category.name }}</p>
    </div> -->
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  order: Object,
})

const formatPrice = (price) => {
  return price+" FCFA"
}
</script>
