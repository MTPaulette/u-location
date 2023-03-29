<template>
  <div class="flex justify-center items-center absolute w-full h-full px-4">
    <div class="max-w-[400px] w-full sm:w-2/3 md:w-auto">
      <div class="w-full text-center bg-white mb-1">
        <myTitle title="S'enregistrer" class="text-sheet-200" />
      </div>
      <div class="flex justify-center main my-2">
        <img src="./../../images/logo.png" class="h-[100px] -mt-6" alt="Agrimax Logo" />
      </div>
      <slot />
    </div>
  </div>
</template>

<script setup>
import myTitle from '@/Components/myTitle.vue'
</script>

<style scoped>
.main {
  background-image: url('./../../images/mango15.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>