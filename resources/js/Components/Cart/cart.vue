<template>
  nb: {{ cartnb }}
  <br />
  {{ cartItems[0] }}

  <!-- <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4"> -->
  <div class="grid grid-cols-1 lg:grid-cols-4 gap-0 lg:gap-4">
    <!--================================== left part ===================================-->
    <div class="col-span-3 order-2 lg:order-1">
      <div class="w-full px-3 py-2 border rounded-lg my-border-gray">
        <form action="" class="w-full pb-6 border-b my-border-gray text-sm text-gray-500 dark:text-gray-400" @submit.prevent="checkout">
          <div class="relative overflow-x-auto">
            <table class="w-full text-left">
              <thead class="text-xs md:text-sm text-gray-900 uppercase dark:bg-gray-700 dark:text-gray-400">
                <!-- <thead class="text-xs md:text-sm text-white uppercase bg-sheet-100 dark:bg-gray-700 dark:text-gray-400"> -->
                <tr>
                  <th scope="col" class="px-4 py-3">
                    Product
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Qty
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Price
                  </th>
                  <th scope="col" class="px-4 py-3">
                    <span class="sr-only">Delete</span>
                  </th>
                </tr>
              </thead>
              <tbody v-if="cartnb">
                <tr v-for="cartItem in cartItems" :key="cartItem.rowId" class="bg-gray-50 border-b my-border-gray dark:bg-gray-800 hover:bg-white dark:hover:bg-gray-600">
                  <CartItem :cart-item="cartItem" />
                </tr>
              </tbody>
              <div v-else>
                <p class="my-8 text-xl md:text-2xl px-4">Aucun product ajoute au pannier</p>
              </div>
            </table>
          </div>
        <!-- <div class="block sm:flex sm:justify-end w-full mt-12">
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
        </div> -->
        </form>
        <div class="flex items-center justify-between mt-6 mb-4">
          <!-- <Button label="add product" rounded btn small /> -->
          <div>
            <a href="/product">
              <Button label="continue market" light rounded small />
            </a>
          </div>
          <div v-if="cartnb">
            <a href="/cart">
              <Button label="checkout" success rounded small />
            </a>
          </div>
        </div>
      </div>

      <!-- free delivery -->
      <div class="flex p-4 mt-8 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Free delivery within 1-2 week (s)</span>
        </div>
      </div>
    </div>
    <!--================================== right part ===================================-->
    <div class="col-span-1 mb-10 lg:mb-0 order-1 lg:order-2">
      <div class="w-full px-4 py-3 border rounded-lg my-border-gray ">
        <div class="flex justify-between mb-2">
          <p>Cart subtotal</p>
          <p class="font-semibold text-sm mt-1 text-black dark:text-white">30 000 FCFA</p>
        </div>
        
        <div class="flex justify-between mb-2 items-center">
          <p>Discount</p>
          <p class="font-semibold text-sm text-black dark:text-white">30%</p>
          <!-- <p class="font-semibold px-1 bg-onion-200 text-white">30%</p> -->
        </div>

        <div class="flex justify-between mb-2">
          <p>Shipping charge</p>
          <p class="font-semibold text-sm text-black dark:text-white">free</p>
        </div>

        <div class="flex justify-between pb-6 border-b my-border-gray">
          <p>Cart total</p>
          <p class="font-bold px-1 bg-sheet-100 text-white">30 000 FCFA</p>
        </div>
        <div class="mt-6">
          loyrtryye yurggf
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Button from '@/Components/button.vue'
import CartItem from '@/Components/Cart/tools/cartItem.vue'


defineProps({
  cartItems: Object,
  cartnb: String,
})

</script>