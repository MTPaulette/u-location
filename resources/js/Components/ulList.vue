<template>
  <ul class="ml-4 list-disc list-inside">
    <li 
      v-for="list in lists" 
      :key="list.id"
    >
      {{ list.name }}
    </li>
  </ul>
</template>

<script setup>

defineProps({
  lists: Object,
})
</script>
