<template>
  <Navbar />
  <slot />
  <Footer />
</template>

<script setup>
import Navbar from '@/Components/Navbar/navbar.vue'
import Footer from '@/Components/Footer/footer.vue'

</script>