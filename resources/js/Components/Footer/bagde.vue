<template>
  <a href="#" class="bg-gray-500 hover:bg-gray-900 hover:text-mango text-gray-800 text-xs mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-blue-400">{{ product }}</a>
</template>
<script setup>
defineProps({
  product: String,
})
</script>
