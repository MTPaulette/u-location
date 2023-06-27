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

<style scoped>
ul li {
  list-style: none;
  padding: 1px 20px;
  background-image: url("./../../images/feuille-50.png");
  background-repeat: no-repeat;
  background-position: left center;
  background-size: 12px;
}
</style>