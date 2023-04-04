<template>
  <Navbar />

  <slot />
  <Newsletter />
  <Footer />
</template>

<script setup>
import Navbar from '@/Components/Navbar/navbar.vue'
import Footer from '@/Components/Footer/footer.vue'
import Newsletter from '@/Components/newsletter.vue'

</script>