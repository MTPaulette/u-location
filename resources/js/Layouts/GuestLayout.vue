<template>
  <Navbar />
  <div class=" text-black dark:text-gray-400 bg-white my-border-gray dark:bg-gray-800">
    <div v-if="flashSuccess" class="mt-8">
      <FlashAlert :message="flashSuccess" />
    </div>
    <slot />
  </div>
  <Newsletter />
  <Footer />
</template>

<script setup>
import Navbar from '@/Components/Navbar/navbar.vue'
import Footer from '@/Components/Footer/footer.vue'
import Newsletter from '@/Components/newsletter.vue'

import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import FlashAlert from '@/Components/flashAlert.vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
</script>