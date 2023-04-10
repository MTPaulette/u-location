<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="facture" />
      </div>
      <div>
        <myTitle title="Facture" />
      </div>
    </div>

    <Vue3Html2pdf>
      <div class="w-full px-3 py-5 h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between">
          <div class="text-base text-gray-500 dark:text-gray-400">
            <!-- <div class="w-2/5 bg-pineapple"> -->
            <h2 class="text-gray-900 dark:text-white">Agrimax</h2>
            <div class="flex">
              <h6>Tel: &nbsp; </h6>
              <ul class="flex list-none text-gray-900 dark:text-white">
                <li>693029546</li>&nbsp;/&nbsp;
                <li>678513874</li>&nbsp;/&nbsp;
                <li>690095004</li>&nbsp;/&nbsp;
              </ul>
            </div>
            <p class="mt-2">Order ID:<span class="font-medium text-base text-black dark:text-white"> #5467</span></p>
          </div>
          <div>
            <img src="./../../../images/logo.png" class="w-32 h-28" alt="Agrimax Logo" />
          </div>
          <div class="text-gray-500 dark:text-gray-400 text-base">
            <p>Date:<span class="text-gray-900 dark:text-white"> 20/02/2024</span></p>
            <p>Heure:<span class="text-gray-900 dark:text-white"> 23:44:54</span></p>
            <p class="mt-2">client: &nbsp;<span class="font-medium text-base text-black dark:text-white uppercase">mayogue paulette</span></p>
          </div>
        </div>
      
        <div class="relative overflow-x-auto my-12">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs px-3 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-2 py-3">
                  <h6 class="text-sm font-medium">Service</h6>
                </th>
                <th scope="col" class="py-3">
                  <h6 class="text-sm font-medium">Descriptions</h6>
                </th>
                <th scope="col" class="py-3">
                  <h6 class="text-sm font-medium">Qty</h6>
                </th>
                <th scope="col" class="py-3">
                  <h6 class="text-sm font-medium">Amounts</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  Apple MacBook Pro 17"
                </th>
                <td>
                  <p class="text-sm">
                    Design and Development Service
                  </p>
                </td>
                <td>
                  <p class="text-sm">3</p>
                </td>
                <td>
                  <p class="text-sm">$700</p>
                </td>
              </tr>

              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  landing page
                </th>
                <td>
                  <p class="text-sm">
                    Landing Page Ui kit design and Development
                  </p>
                </td>
                <td>
                  <p class="text-sm">1</p>
                </td>
                <td>
                  <p class="text-sm">$1000</p>
                </td>
              </tr>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  Apple MacBook Pro 17"
                </th>
                <td>
                  <p class="text-sm">
                    Web Design and Development and Seo
                  </p>
                </td>
                <td>
                  <p class="text-sm">2</p>
                </td>
                <td>
                  <p class="text-sm">$4000</p>
                </td>
              </tr>

            
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" />
                <td />
                <td>
                  <h6 class="text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Subtotal</h6>
                </td>
                <td>
                  <h6 class="text-sm font-semibold text-black whitespace-nowrap dark:text-white">$5700</h6>
                </td>
              </tr>

              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" />
                <td />
                <td>
                  <h6 class="text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Discount</h6>
                </td>
                <td>
                  <h6 class="text-sm font-semibold text-black whitespace-nowrap dark:text-white">45%</h6>
                </td>
              </tr>

              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" />
                <td />
                <td>
                  <h6 class="text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Shipping Charge</h6>
                </td>
                <td>
                  <h6 class="text-sm font-semibold text-black whitespace-nowrap dark:text-white">Free</h6>
                </td>
              </tr>
            
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" />
                <td />
                <td>
                  <h4 class="text-xl font-bold text-black whitespace-nowrap dark:text-white">Total</h4>
                </td>
                <td>
                  <h4 class="text-xl font-bold text-black whitespace-nowrap dark:text-white">$3135</h4>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </Vue3Html2pdf>

    <div class="my-14">
      <Alert :message="alertMsg" />
    </div>

    <div class="flex justify-center" @click="generateReport()">
      <Button :label="btnLabel" />
    </div>
  </DashboardLayout>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'
// import Vue3Html2pdf from 'vue3-html2pdf'

export default {
  layout: BaseLayout,
  methods: {
    /*
            Generate Report using refs and calling the
            refs function generatePdf()
        */
    generateReport () {
      this.$refs.html2Pdf.generatePdf()
    },
  },
}

</script>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import Alert from '@/Components/alert.vue'
import Button from '@/Components/button.vue'
import Vue3Html2pdf from '@/Components/vuehtml2pdf.vue'
defineProps({
  posts: Object,
})

const alertMsg = "All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above."
const btnLabel = "Telecharger Facture"
</script>

