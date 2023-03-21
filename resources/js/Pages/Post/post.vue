<template>
  <div v-for="post in posts" :key="post.id">
    {{ post }}
  </div>
</template>

<script setup>
defineProps({
  posts: Array,
})
</script>