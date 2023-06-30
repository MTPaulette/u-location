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
      <h4 class="w-full truncate font-semibold dark:text-gray-200 capitalize text-lg leading-5">{{ product.name }}</h4>
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
  

      <p class="truncate w-full text-xs md:text-[10px] text-gray-600 dark:text-gray-400">categorie: la categorie fruits et legumes de saison</p>
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
defineProps({
  product: Object,
})

const getImgUrl = (src) =>{
  return  new URL('./../../../../../public/storage/'+src, import.meta.url).href

}
</script>
