<template>
  <DashboardLayout>
    <div>
      <CardTest />
      <CardLineChart />
      <CardBarChart />
    </div>
  </DashboardLayout>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import CardLineChart from '@/Components/Cards/CardLineChart.vue'
import CardBarChart from '@/Components/Cards/CardBarChart.vue'
import CardTest from '@/Components/Cards/CardTest.vue'

export default {
  name: 'DashboardHome',
  components: {
    DashboardLayout,
    CardLineChart,
    CardBarChart,
    CardTest,
  },
  layout: BaseLayout,
}
</script>
