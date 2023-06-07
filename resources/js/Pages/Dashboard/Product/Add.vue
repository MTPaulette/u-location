<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="new-product" />
      </div>
      <div>
        <myTitle title="New Product" />
      </div>
    </div>
    <div class="w-full px-3 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
      <div class="">
        <EditProduct :advantages="advantages" :ingredients="ingredients" :weights="weights" :categories="categories" />
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import EditProduct from '@/Components/Product/EditProduct.vue'
// import ListUser from '@/Components/User/ListUser.vue'

defineProps({
  advantages: Object,
  ingredients: Object,
  weights: Object,
  categories: Object,
})
</script>

