<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="users" />
      </div>
      <div>
        <myTitle title="all users" />
      </div>
    </div>


    <div class="w-full px-3 py-5 h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="">
        <TableUser :users="users" />
      </div>
    </div>
  </DashboardLayout>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'

export default {
  layout: BaseLayout,
}

</script>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
// import Alert from '@/Components/alert.vue'
// import Button from '@/Components/button.vue'
// import CardTable from "@/Components/Cards/CardTable.vue"
import TableUser from '@/Components/Tables/tableUser.vue'

defineProps({
  users: Object,
})

// const alertMsg = "All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above."
// const btnLabel = "Telecharger Facture"
</script>

