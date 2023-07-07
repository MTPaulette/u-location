<template>
  <div class="border-0 my-border-gray border-r border-red-100 w-full px-4 py-3 mb-2 hover:bg-gray-100 dark:hover:bg-gray-900">
    <div class="my-border-gray border-b border-red-100 pb-3 mb-1">
      <div class="flex-shrink-0 relative">
        <img class="rounded w-full h-20 sm:h-28" src="./../../images/mango1.jpg" alt="product image" />
        <!-- <img class="rounded w-full h-20 sm:h-28" src="./../../images/illustration/purpose.jpg" alt="product image" /> -->
        <div class="absolute right-0 top-0 w-full h-full rounded bg-black/50 dark:bg-black/75" />
        <div class="absolute right-0 top-0">
          <div class="flex-shrink-0 bg-black/755">
            <img src="./../../images/naturel_white.png" class="h-12 w-14" />
          </div>
        </div>
      </div>
      <!-- <img v-if="product.images.length" class="rounded w-16 h-14" :src="getImgUrl(product.images[0].filename)" alt="product image" /> -->
    </div>
            
    <div class="w-full mb-2">
      <div class="w-full flex justify-between items-center">
        <h4 class="w-full truncate font-semibold dark:text-gray-200 capitalize text-lg leading-5">{{ product.name }}</h4>
        <!-- <p class="font-semibold truncate capitalize text-gray-900 dark:text-gray-300">{{ product.name }}</p> -->
        <div>
          <Link :href="route('product.show', {product: product.id})">
            <div class="text-gray-600 text-sm dark:text-gray-400 hover:text-black dark:hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">  
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg>
            </div>
          </Link>
        </div>
      </div>

      <div class="flex justify-between items-center font-semibold">
        <p class="text-sheet-50 text-sm whitespace-nowrap">20 000FCFA</p>
        <p class="text-danger text-[10px] line-through whitespace-nowrap">22 000FCFA</p>
      </div>
      <!-- <p class="inline-flex items-center justify-center px-1.5 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">20 000 FCFA</p> -->
    </div>
    <div>
      <div class="h-10 md:h-8 overflow-hidden bg-pink-4000 text-justify text-sm leading-4 md:text-xss mb-0.5 text-gray-700 dark:text-gray-400">
        <p class="content" v-html="product.description" />
      </div>
  

      <p class="truncate w-full text-xs md:text-[10px] text-gray-600 dark:text-gray-400">categorie: {{ product.category.name }}</p>
      <!-- <div class="flex items-center truncate text-xs md:text-[10px] text-gray-600 dark:text-gray-400">
          <span class="mr-1 text-sheet-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
            </svg>
          </span>
          <div class="truncate">
            lo {{ product.createdAtDiff }}
            {{ product.created_at }}
          </div>
        </div> -->
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  product: Object,
})

const getImgUrl = (src) =>{
  return  new URL('./../../../../../public/storage/'+src, import.meta.url).href

}
</script>
