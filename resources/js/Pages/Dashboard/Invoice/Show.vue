<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="invoice" />
      </div>
      <div>
        <myTitle title="Invoice" />
      </div>
    </div>


    <div class="w-full px-3 py-5 h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="flex justify-between w-full">
        <div class="text-base text-gray-500 dark:text-gray-400 w-1/3">
          <!-- <div class="text-base text-gray-500 dark:text-gray-400 w-[130px] md:w-1/3 bg-green-100"> -->
          <!-- <div class="w-2/5 bg-pineapple"> -->
          <h2 class="text-black dark:text-white">Agrimax</h2>
          <div class="flex">
            <h6>Tel: &nbsp; </h6>
            <ul class="flex flex-wrap w-full list-none text-gray-900 dark:text-white">
              <li>693029546</li>&nbsp;/&nbsp;
              <li>678513874</li>&nbsp;/&nbsp;
              <li>690095004</li>&nbsp;/&nbsp;
            </ul>
          </div>
          <p class="mt-2">Order ID:<span class="font-medium text-base text-black dark:text-white"> #5467</span></p>
        </div>

        <div class="w-1/6">
          <!-- <img src="./../../../images/logo.png" class="w-full md:w-32 md:h-28" alt="Agrimax Logo" /> -->
          <img src="./../../../../images/logo.png" class="w-20 h-24 md:w-32 md:h-28" alt="Agrimax Logo" />
        </div>

        <div class="w-1/3 text-gray-500 dark:text-gray-400 text-base">
          <!-- <div class="w-2/5 bg-green-200 flex flex-col items-end"> -->
          <p>Date:<span class="text-gray-900 dark:text-white"> 20/02/2024</span></p>
          <p>Heure:<span class="text-gray-900 dark:text-white"> 23:44:54</span></p>
          <p class="mt-2">client: <span class="font-medium text-base text-black dark:text-white uppercase">mayogue paulette</span></p>
        </div>
      </div>

      <div class="my-12">
        <ListInvoice :products="products" />
      </div>

      <div class="my-14">
        <Alert :message="alertMsg" />
      </div>

      <Link :href="route('invoice.store', {post: popularPost.id})" class="flex justify-center">
        <Button label="print invoice" hasicon rounded base success>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
          </svg>
        </Button>
      </Link>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import Alert from '@/Components/alert.vue'
import Button from '@/Components/button.vue'
// import CardTable from "@/Components/Cards/CardTable.vue"
import ListInvoice from '@/Components/Invoice/ShowInvoice.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  products: Object,
})

const alertMsg = "All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above."
</script>

