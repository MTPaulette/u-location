<template>
  <div class="w-full">
    <h2 class="font-bold text-dark text-onion-200 pb-0 relative capitalize">{{ title }}</h2>
    <!-- <h2 class="font-semibold text-dark text-lg pb-0 relative capitalize">{{ title }}</h2> -->
    <span class="h-[4px] bg-onion-200 w-12 mb-2 inline-block" />
  </div>

  <!-- <div class="w-full flex align-middle">
    <span class="w-[4px] bg-sheet-100 h-8 mr-3 inline-block" />
    <h2 class="font-semibold text-dark text-lg pb-3 relative capitalize">{{ title }}</h2>
  </div> -->
</template>

<script setup>
defineProps({
  title: String,
})
</script>