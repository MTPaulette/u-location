<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="products" />
      </div>
      <div>
        <myTitle title="All products" />
      </div>
    </div>


    <div class="w-full px-3 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
      <div class="">
        <ListProduct :products="products" />
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import ListProduct from '@/Components/Product/ListProduct.vue'

defineProps({
  products: Object,
})
</script>

