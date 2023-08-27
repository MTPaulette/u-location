<template>
  <span>{{ formatPrice() }}</span>
</template>

<script setup>
const props = defineProps({
  value: String,
})

const formatPrice = () => {
  return props.value+" FCFA"
}
</script>