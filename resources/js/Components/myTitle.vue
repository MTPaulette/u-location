<template>
  <h2 class="font-semibold text-3xl md:text-[35px] dark:text-gray-100  mb-4"> {{ title }} </h2>
</template>

<script setup>
defineProps({
  title: String,
})
</script>