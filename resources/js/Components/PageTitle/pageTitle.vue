<template>
  <!-- <div class="flex justify-center items-center w-full h-32 md:h-52 bg-purple-200 main">
    <h1 class="font-semibold text-sheet-200 text-3xl md:text-4xl capitalize text-opacity-100">
      {{ title }} page
    </h1>
  </div> -->
  <div class="pb-8">
    <breadcrumb :link2="title" />
  </div>
</template>

<script setup>
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
defineProps({
  title: String,
})
</script>

<style scoped>
.main {
  background-image: url('./../../../images/mango1.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>