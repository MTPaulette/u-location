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
import CardLineChart from '@/Components/Card/CardLineChart.vue'
import CardBarChart from '@/Components/Card/CardBarChart.vue'
import CardTest from '@/Components/Card/CardTest.vue'

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
