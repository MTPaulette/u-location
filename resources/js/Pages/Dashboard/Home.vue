<template>
  <DashboardLayout>
    <div class="flex flex-wrap-reverse justify-between items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <myTitle title="Dashboard" />
      </div>
      <div>
        <breadcrumb link1="dashboard" link2="accueil" />
      </div>
    </div>
    <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <!-- <div class="flex flex-wrap md:gap-2 lg:bg-pineapple xl:bg-mango sm:bg-sheet-100 md:bg-danger gap-4 mb-4"> -->
      <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 md:gap-2 gap-4 mb-4">
        <CardDefault type="order" title="nouvelle commande" value="34567" percent="+2.00" />
        <CardDefault type="income" title="total recette" value="34567" percent="+2.00" />
        <CardDefault type="expense" title="total depense" value="34567" percent="+2.00" />
        <CardDefault type="user" title="nouveau abonne" value="34567" percent="+2.00" />
        
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
      </div>


      
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
      </div>
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
      </div>
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
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
import CardDefault from '@/Components/Card/cardDefault.vue'
</script>