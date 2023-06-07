<template>
  <!-- {{ products }} -->
  <form action="" class="w-full text-sm text-gray-500 dark:text-gray-400" @submit.prevent="checkout">
    <div class="relative overflow-x-auto">
      <table class="w-full text-left">
        <thead class="text-xs md:text-sm text-white uppercase bg-sheet-100 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-2">
              Product ID
            </th>
            <th scope="col" class="px-6 py-2">
              Product name
            </th>
            <th scope="col" class="px-6 py-2">
              Description
            </th>
            <th scope="col" class="px-6 py-2">
              Price
            </th>
            <th scope="col" class="px-6 py-2">
              Qty
            </th>
            <th scope="col" class="px-6 py-2">
              Total
            </th>
            <th scope="col" class="px-6 py-2">
              <span class="sr-only">Delete</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products.data" :key="product.id" class="bg-gray-50 border-b dark:bg-gray-800 hover:bg-white dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-2">
              {{ product.code }}
            </th>
            <td class="px-6 py-2 capitalize font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ product.designation }}
            </td>
            <td class="px-6 py-2">
              Design and Development Service
            </td>
            <td class="px-6 py-2">
              {{ product.price }} FCFA
            </td>
            <td class="px-6 py-2">
              <div class="flex items-center justify-center border my-border-gray">
                <span class="px-2 cursor-pointer" @click="decrement">&mdash;</span>
                <input type="text" :value="form.qty" readonly class="w-12 h-7 text-center border-none bg-white" />
                <span class="px-2 cursor-pointer" @click="increment">&#xff0b;</span>
              </div>
              <!-- <input id="qty" v-model="form.qty" type="number" min="1" name="qty" /> -->
            </td>
            <td class="px-6 py-2">
              {{ product.price }} * 68 FCFA
            </td>
            <td class="px-6 py-2">
              <div class="hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="block sm:flex sm:justify-end w-full mt-12">
      <!-- <div class="w-full sm:w-2/5">Lorem ipsum dolor sit amet consectetur adipi perspiciatis similique odio reiciendis minus voluptatum.</div> -->
        
      <div class="w-full sm:w-[250px]">
        <div class="flex justify-between mb-2">
          <p>Cart Subtotal</p>
          <p class="font-semibold text-black dark:text-white">30 000 FCFA</p>
        </div>
        
        <div class="flex justify-between mb-2">
          <p>Discount</p>
          <p class="font-semibold px-1 bg-onion-200 text-white">30%</p>
        </div>

        <div class="flex justify-between pb-2 border-b my-border-gray">
          <p>Shipping Charge</p>
          <p class="font-semibold text-black dark:text-white">free</p>
        </div>

        <!-- <div class="flex justify-between my-3 -mx-3 px-3 py-3 bg-mango text-black"> -->
        <div class="flex justify-between my-6">
          <p>Cart Total</p>
          <p class="font-bold px-1 bg-mango text-white">30 000 FCFA</p>
        </div>
          
        <a href="/cart">
          <Button type="btn" label="continue market" success large />
        </a>
        <a href="/cart">
          <Button type="submit" label="checkout" success large />
        </a>
      </div>
    </div>
  </form>
  <!-- <div v-if="products.data.length" class="w-full flex justify-center mt-8 pb-12">
    <Pagination :links="products.links" />
  </div> -->
</template>

<script setup>
// import Pagination from '@/Components/pagination.vue'
import Button from '@/Components/button.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  qty: 1,
})

const checkout = () => form.post('/checkout')
const decrement = () => {
  if(form.qty >= 2)
    form.qty--
}
const increment = () => form.qty++

defineProps({
  products: Object,
})
</script>