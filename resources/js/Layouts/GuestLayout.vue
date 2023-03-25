<template>
  <Navbar />
  <div class="container bg-green-50 mx-auto">
    <slot />
  </div>
  <Footer />
</template>

<script setup>
import Navbar from '@/Components/Navbar/navbar.vue'
import Footer from '@/Components/Footer/footer.vue'

</script>