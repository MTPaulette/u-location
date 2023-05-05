<template>
  <MainLayout :informations="informations">
    je suis l index
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'

defineProps({
  informations: Object,
})
</script>

<!-- script >
import MainLayout from '@/Layouts/MainLayout.vue'

export default {
  layout: MainLayout,
}
</script -->