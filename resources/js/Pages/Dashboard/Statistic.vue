<template>
  <DashboardLayout>
    <div>
      <Diagram />
    </div>
  </DashboardLayout>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import Diagram from '@/Components/Card/diagram.vue'

export default {
  name: 'DashboardHome',
  components: {
    DashboardLayout,
    Diagram,
  },
  layout: BaseLayout,
}
</script>