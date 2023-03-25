<template>
  <!-- pb-5 mb-5 rounded-full md:max-w-[90px]  -->
  <div class="w-full h-24 flex items-center mb-5 md:mb-4 pb-2 border-0 border-gray-100 md:border-b">
    <div class="w-[80px] md:w-2/12 lg:w-[50px] rounded-sm  md:h-[40px] lg:h-[50px] overflow-hidden mr-5 md:mr-4">
      <img src="./../../images/carousel/1.jpg" alt="image" class="w-full h-full" />
    </div>
    <div class="w-3/4">
      <h4 class="w-full truncate h-5 mb-1">
        <a href="" class="text-gray-900 text-base md:text-sm dark:text-gray-400 overflow-hidden w-full">{{ post.name }}</a>
      </h4>
      <p class="h-10 md:h-8 text-sm md:text-xs overflow-hidden mb-2 text-gray-700 dark:text-gray-400">{{ post.content }}</p>

      <div>
        <a href="#" class="flex items-center truncate overflow-hidden text-xs md:text-[10px] text-gray-600 dark:text-gray-400">
          <span class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
            </svg>
          </span>
          {{ post.created_at }}
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  post: Object,
})
</script>