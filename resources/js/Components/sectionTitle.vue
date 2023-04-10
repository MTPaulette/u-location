<template>
  <div class="w-full">
    <h2 class="font-bold text-dark text-gray-900 pb-0 relative capitalize">{{ title }}</h2>
    <span class="h-[4px] bg-onion-200 w-12 mb-2 inline-block" />
  </div>
</template>

<script setup>
defineProps({
  title: String,
})
</script>