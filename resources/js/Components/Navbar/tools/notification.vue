<template>
  <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button"> 
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" /></svg>
    <div class="relative flex">
      <span v-if="notificationCount" class="relative inline-flex text-[8px] md:text-xs text-white px-1 leading-[12px] bg-red-500 border-2 border-white rounded-full -top-2 right-3 dark:border-gray-600">
        {{ notificationCount }}
      </span>
    </div>
  </button>
  <!-- Dropdown menu -->
  <div id="dropdownNotification" class="z-20 hidden w-full max-w-xs bg-white divide-y divide-gray-100 rounded-lg shadow-md dark:shadow-black dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
    <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
      Notifications
    </div>
    <div class="divide-y divide-gray-100 dark:divide-gray-700 mb-10 text-sm leading-[18px] px-2 md:px-0">
      <!-- <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
        <div class="flex-shrink-0">
          <img class="rounded-full w-11 h-11" src="./../../../../images/mango1.jpg" alt="Bonnie image" />
          <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-red-600 border border-white rounded-full dark:border-gray-800">
            <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" /></svg>
          </div>
        </div>
        <div class="w-full pl-3">
          <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
          <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
        </div>
      </a> -->
      <div v-if="notifications">
        <div v-for="notification in notifications" :key="notification.id">
          <div v-if="notification.type === 'App\\Notifications\\OrderPassed'">
            <OrderPassed :notification="notification" />
          </div>
          <!-- <div v-if="notification.type === 'App\\Notifications\\OrderPassed'"> -->
          <div v-if="notification.type === 'App\\Notifications\\UserCreated'">
            <UserCreated :notification="notification" />
          </div>
        </div>
      </div>
      <p v-else class="my-8 text-xl md:text-2xl text-gray-500 px-4">vous n'avez pas de notification.</p>
    </div>
    <Link v-if="notifications" :href="route('notification.index')" class="block bottom-0 absolute w-full py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
      <div class="inline-flex items-center ">
        <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>
        View all
      </div>
    </Link>
  </div>
</template>

<script setup>
import OrderPassed from '@/Components/NotificationTypes/OrderPassed.vue'
import UserCreated from '@/Components/NotificationTypes/UserCreated.vue'
import { usePage, Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const notifications = computed(
  () => page.props.user? page.props.user.notifications: null,
)
const notificationCount = computed(
  () => page.props.user? Math.min(page.props.user.notificationCount,9): 0,
)

</script>