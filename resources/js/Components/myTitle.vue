<template>
  <h2 class="font-semibold text-2xl md:text-3xl dark:text-gray-100 mb-4"> {{ title }} </h2>
</template>

<script setup>
defineProps({
  title: String,
})
</script>