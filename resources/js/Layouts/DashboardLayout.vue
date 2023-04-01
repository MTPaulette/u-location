<template>
  <div>
    <Sidebar />
  
    <div class="bg- bg-gray-100 p-4 sm:ml-52 xl:ml-64 mt-14">
      <!-- <div class="bg- bg-gray-100 p-4 sm:ml-64 mt-14"> -->
      <slot />
      <Footer />
    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Dashboard/Sidebar.vue'
// import NavbarDashboard from '@/Components/Navbar/navbarDashboard.vue'
import Footer from '@/Components/Footer/footerDashboard.vue'

</script>