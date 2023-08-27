<template>
  <button id="dropdownPannierButton" data-dropdown-toggle="dropdownPannier" class="inline-flex items-center mt-1 text-sm font-medium text-center focus:outline-none text-black dark:hover:text-white dark:text-gray-500" type="button"> 
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
    </svg>
    <div class="relative flex">
      <span class="relative inline-flex text-[10px] md:text-xs text-white px-1 leading-[12px] bg-red-500 border-2 border-white rounded-full -top-2 right-3 dark:border-gray-600">
        {{ cartcount }}
      </span>
    </div>
  </button>
  <!-- Dropdown menu -->
  <div id="dropdownPannier" class="z-20 hidden w-[300px] right-64 bg-white overflow-x-hidden max-w-xs px-4 py-3 divide-y divide-gray-100 shadow-lg shadow-black dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownPannierButton">
    <div class="flex justify-between text-sm uppercase font-bold p-3 pb-2 text-black dark:text-gray-100">
      <p>{{ cartcount }} items</p>
      <!-- <p class="hover:text-sheet-200"><Link href="/cart">view cart</Link></p> -->
    </div>
    <div class="divide-y max-h-72 over-y divide-gray-100 dark:divide-gray-700">
      <div v-for="cartItem in cartItems" :key="cartItem.rowId" class="flex justify-between w-full p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
        <div class="w-full">
          <div class="w-full flex justify-between items-center">
            <p class="font-semibold truncate capitalize w-5/6 text-gray-900 dark:text-gray-300">{{ cartItem.name }}</p>
            <div>
              <Link :href="route('product.show', {product: cartItem.options.product.id})">
                <div class="text-gray-500 text-sm dark:text-gray-400 hover:text-black dark:hover:text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">  
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                  </svg>
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">  
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg> -->
                </div>
              </Link>
            </div>
          </div>
          <div class="flex items-center text-gray-500 text-sm dark:text-gray-400">
            <div v-if="cartItem.options.images" class="w-14 h-14 mr-4">
              <img :src="cartItem.options.images.src" alt="product image" class="w-full h-full" />
            </div>
            <div>
              <p>weight: {{ cartItem.options.weight_name }}</p>
              <p>qty: {{ cartItem.qty }}</p>
              <p class="whitespace-nowrap">P.U: <Price :value="cartItem.price" /> each</p>
              <p class="font-semibold whitespace-nowrap">P.T: <Price :value="cartItem.options.totalPrice" /></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- total -->
    <div class="divide-y divide-gray-100 dark:divide-gray-700">
      <div class="flex justify-between text-lg uppercase font-bold px-3 py-4 text-black dark:text-gray-100">
        <p>total</p>
        <p><Price :value="subtotal" /></p>
      </div>
    </div>
    <Link class="w-full flex justify-center p-3" href="/cart">
      <Button type="btn" label="view cart" success large />
    </Link>
  </div>
</template>

<script setup>
import Button from '@/Components/button.vue'
import Price from '@/Components/Price.vue'
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const cartItems = computed(
  () => page.props.cartItems,
)

const cartcount = computed(
  () => page.props.cartcount,
)

const subtotal = computed(
  () => page.props.subtotal,
)
</script>