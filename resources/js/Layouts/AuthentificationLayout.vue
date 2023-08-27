<template>
  <!-- <DarkMode /> -->
  <div class="flex justify-center items-center absolute w-full h-full px-4 bg-white my-border-gray dark:bg-gray-800">
    <div class="max-w-[400px] w-full sm:w-2/3 md:w-auto">
      <div class="w-full text-center bg-white dark:bg-gray-700 mb-1">
        <slot name="title" />
      </div>
      <div class="flex justify-center main my-2">
        <img src="./../../images/logo.png" class="h-[100px] -mt-6" alt="Agrimax Logo" />
      </div>
      <div>
        <slot />
      </div>
    </div>
  </div>
</template>

<style scoped>
.main {
  background-image: url('./../../images/mango15.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>