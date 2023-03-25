<template>
  <div class="flex justify-center items-center w-full h-32 md:h-52 bg-green-50">
    <h1 class="font-semibold text-sheet-100 text-3xl md:text-4xl capitalize">
      {{ title }} page
    </h1>
  </div>
  <div class="ml-4 my-8">
    <breadcrumb :page="title" />
  </div>
</template>

<script setup>
import breadcrumb from './tools/breadcrumb.vue'
defineProps({
  title: String,
})
</script>