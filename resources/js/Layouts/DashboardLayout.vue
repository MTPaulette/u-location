<template>
  <div>
    <Sidebar />
  
    <div class="bg-gray-100 dark:bg-gray-700 p-4 sm:ml-52 xl:ml-64 mt-14">
      <!-- <div class="bg-gray-100 dark:bg-gray-700 p-4 sm:ml-52 xl:ml-64 mt-14"> -->
      <div v-if="flashSuccess">
        <FlashAlert :message="flashSuccess" />
      </div>
      <slot />
      <Footer />
    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Dashboard/Sidebar.vue'
// import NavbarDashboard from '@/Components/Navbar/navbarDashboard.vue'
import Footer from '@/Components/Footer/footerDashboard.vue'

import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import FlashAlert from '@/Components/flashAlert.vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
</script>

<style>
.content ol {
  padding: 0 2rem;
  list-style: decimal;
}
</style>