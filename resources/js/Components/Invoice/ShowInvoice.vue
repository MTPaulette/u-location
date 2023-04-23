<template>
  <!-- {{ products }} -->
  <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs md:text-sm text-white uppercase bg-sheet-100 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Product ID
          </th>
          <th scope="col" class="px-6 py-3">
            Product name
          </th>
          <th scope="col" class="px-6 py-3">
            Description
          </th>
          <th scope="col" class="px-6 py-3">
            Qty
          </th>
          <th scope="col" class="px-6 py-3">
            Price
          </th>
          <!-- <th scope="col" class="px-6 py-3">
            <span class="sr-only">Edit</span>
          </th> -->
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products.data" :key="product.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-3">
            {{ product.code }}
          </th>
          <td class="px-6 py-3 capitalize font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ product.designation }}
          </td>
          <td class="px-6 py-3">
            Design and Development Service
          </td>
          <td class="px-6 py-3">
            68
          </td>
          <td class="px-6 py-3">
            {{ product.price }} FCFA
          </td>
        </tr>
            
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-2" />
          <td />
          <td />
          <td class="px-6 py-2 capitalize font-medium text-gray-900 whitespace-nowrap dark:text-white">
            subtotal
          </td>
          <td class="px-6 py-2 font-semibold text-black whitespace-nowrap dark:text-white">
            $5700
          </td>
        </tr>
            
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-2" />
          <td />
          <td />
          <td class="px-6 py-2 capitalize font-medium text-gray-900 whitespace-nowrap dark:text-white">
            discount
          </td>
          <td class="px-6 py-2 font-semibold text-black whitespace-nowrap dark:text-white">
            45%
          </td>
        </tr>
            
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-2" />
          <td />
          <td />
          <td class="px-6 py-2 capitalize font-medium text-gray-900 whitespace-nowrap dark:text-white">
            shipping charge
          </td>
          <td class="px-6 py-2 font-semibold text-black whitespace-nowrap dark:text-white">
            free
          </td>
        </tr>

        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-2" />
          <td />
          <td />
          <td class="px-6 py-2 capitalize font-semibold text-gray-900 whitespace-nowrap dark:text-white">
            total
          </td>
          <td class="px-6 py-2 text-base font-semibold text-black whitespace-nowrap dark:text-white">
            $5700
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div v-if="products.data.length" class="w-full flex justify-center mt-8 mb-12">
    <Pagination :links="products.links" />
  </div>
</template>

<script setup>
import Pagination from '@/Components/pagination.vue'

defineProps({
  products: Object,
})
</script>