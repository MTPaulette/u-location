<template>
  <div class="content">
    <ul class="list-disc list-inside">
      <li 
        v-for="list in lists" 
        :key="list.id"
      >
        {{ list.name }}
      </li>
    </ul>
  </div>
</template>

<script setup>

defineProps({
  lists: Object,
})
</script>