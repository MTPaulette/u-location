<template>
  <div class="border-0 my-border-gray border-b max-w-full">
    <div class="flex items-center px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
      <div class="flex-shrink-0">
        <img v-if="product.images.length" class="rounded w-16 h-14" :src="getImgUrl(product.images[0].filename)" alt="product image" />
      </div>
      <div class="w-full pl-3">
        {{ product.category_id }}
        <h4 class="w-5/6 truncate h-5 mb-1">
          <a href="" class="text-base">{{ product.name }}</a>
          <!-- <a href="" class="text-base md:text-sm">{{ product.name }}</a> -->
        </h4>
      
        <div class="h-10 md:h-8 overflow-hidden text-justify text-sm md:text-xs mb-2 text-gray-700 dark:text-gray-400"><p class="content" v-html="product.description" /></div>
        <!-- <p class="h-10 md:h-8 overflow-hidden text-justify text-sm md:text-xs mb-2 text-gray-700 dark:text-gray-400"><p v-html="product.description" /></p> -->
    

        <div class="flex items-center truncate text-xs md:text-[10px] text-gray-600 dark:text-gray-400">
          <span class="mr-1 text-sheet-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
            </svg>
          </span>
          <div class="truncate">
            lo {{ product.createdAtDiff }}
            {{ product.created_at }}
          </div>
        </div>
      </div>
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