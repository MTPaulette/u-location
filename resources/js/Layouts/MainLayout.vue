<template>
  <Topbar :informations="informations" />
  <!-- <Navbar /> -->
  <SearchCategoryBar :categories="categories" />
  <div class="hidden sm:block">
    <NavbarCategory :categories="categories" />
  </div>
  <div class=" text-black dark:text-gray-400 bg-white my-border-gray dark:bg-gray-800">
    <div v-if="flashSuccess">
      <FlashAlert :message="flashSuccess" />
    </div>
    <slot />
  </div>
  <Newsletter />
  <Footer />
</template>

<script setup>
// import Navbar from '@/Components/Navbar/navbar.vue'
import Topbar from '@/Components/Navbar/topbar.vue'
import SearchCategoryBar from '@/Components/Navbar/searchCategoryBar.vue'
import NavbarCategory from '@/Components/Navbar/navbarCategory.vue'
import Footer from '@/Components/Footer/footer.vue'
import Newsletter from '@/Components/newsletter.vue'

import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import FlashAlert from '@/Components/flashAlert.vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)

defineProps({
  informations: Object,
  categories: Object,
})
</script>
