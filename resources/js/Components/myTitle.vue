<template>
  <!-- <h2 class="title mb-4"> {{ title }} </h2> -->
  <h2 class="title"> {{ title }} </h2>
  <span class="h-[4px] bg-onion-200 w-12 inline-block mb-4 mt-2" />
</template>

<script setup>
defineProps({
  title: String,
})
</script>