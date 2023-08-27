<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="notifications" />
      </div>
      <div>
        <myTitle title="Notifications" />
      </div>
    </div>
    <div class="w-full px-4 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800 text-gray-800 dark:text-gray-400">
      <div v-if="notifications.data.length">
        <div v-for="notification in notifications.data" :key="notification.id">
          <div v-if="notification.type === 'App\\Notifications\\OrderPassed'">
            <!-- <OrderPassed :notification="notification" /> -->
            <UserCreated :notification="notification" />
          </div>
          <div v-if="notification.type === 'App\\Notifications\\UserCreated'">
            <UserCreated :notification="notification" />
          </div>
        </div>
      </div>
      <p v-else class="my-8 text-xl md:text-2xl text-gray-500">vous n'avez pas de notification.</p>
    </div>
    <div v-if="notifications.data.length" class="w-full flex justify-center mt-8 pb-12">
      <pagination :links="notifications.links" />
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import OrderPassed from '@/Components/NotificationTypes/OrderPassed.vue'
import UserCreated from '@/Components/NotificationTypes/UserCreated.vue'
import pagination from '@/Components/pagination.vue'

defineProps({
  notifications: Object,
})

</script>