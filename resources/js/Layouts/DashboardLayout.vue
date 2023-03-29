<template>
  <div id="main-body" class="leading-normal tracking-normal">
    <div class="flex flex-wrap">
      <Sidebar />

      <div id="main-content" class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen" :class="sideBarOpen ? 'overlay' : ''">
        <Navbar />

        <div class="p-6 bg-gray-100 mb-20">
          <slot />
        </div>

        <MyFooter />
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'


import Sidebar from '@/Components/Dashboard/Sidebar.vue'
import Navbar from '@/Components/Dashboard/Navbar.vue'
import MyFooter from '@/Components/Dashboard/Footer.vue'

export default {
  name: 'Dashboard',
  components: {
    Sidebar,
    Navbar,
    MyFooter,
  },
  computed: {
    ...mapState(['sideBarOpen']),
  },
}
</script>
