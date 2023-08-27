<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="orders" />
      </div>
      <div>
        <myTitle title="My Orders" />
      </div>
    </div>
    <!-- <div class="w-full px-5 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800"> -->
    <div class="w-full px-5 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
      <div class="block sm:flex justify-end sm:items-center py-3 bg-white dark:bg-gray-800">
        <div class="flex items-center">
          <div class="relative">
            <SearchBar placeholder="Search for orders" />
          </div>
          <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex mt-2 ml-2 text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
              </svg>
            </button>
        
            <!-- Dropdown menu -->
            <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                </li>
              </ul>
              <div class="py-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete Order</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="flex justify-between items-center w-full my-10">
          <div class="w-2/3 border my-border-gray" />
          <h4 class="px-10 font-semibold text-gray-500 dark:text-gray-200 text-lg leading-5 whitespace-nowrap">il ya un mois</h4>
          <div class="w-2/3 border my-border-gray" />
        </div>
        <div class="flex flex-wrap gap-4 sm:gap-4">
          <!-- <div class="flex flex-wrap justify-between gap-y-4 sm:gap-4"> -->
          <div v-for="order in orders" :key="order.id" class="w-[155px] sm:w-[200px]">
            <OrderCard :order="order" />
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import OrderCard from '@/Components/orderCard.vue'
import SearchBar from '@/Components/Navbar/tools/searchBar.vue'

defineProps({
  orders: Object,
})
</script>