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
    <div class="w-full px-4 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
      <notification />
      <notification />
      <notification />
      <notification />
    </div>
    <div v-if="posts.data.length" class="w-full flex justify-center mt-8 pb-12">
      <pagination :links="posts.links" />
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import notification from '@/Components/Notification/notification.vue'
import pagination from '@/Components/pagination.vue'
defineProps({
  posts: Object,
})
</script>