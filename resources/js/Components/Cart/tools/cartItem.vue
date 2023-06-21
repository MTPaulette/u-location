<template>
  <th scope="row" class="px-4 py-3 capitalize font-medium text-gray-900 dark:text-white">
    <div class="w-full flex items-center justify-center">
      <div v-if="cartItem.options.images.length">
        <img :src="cartItem.options.images[0].src" alt="product image" class="w-20 h-16" />
      </div>
      <div class="w-full pl-3">
        <h4 class="w-5/6 truncate h-5 mb-1">
          <a href="" class="text-base">{{ cartItem.name }}</a>
          <!-- <a href="" class="text-base">{{ cartItem.options.product_code }}</a> -->
        </h4>
      
        <div class="h-10 md:h-8 w-full relative overflow-hidden text-justify text-sm md:text-xs mb-2 text-gray-700 dark:text-gray-400">
          <p v-html="cartItem.options.description" />
        </div>
    

        <div class="flex items-center truncate">
          <span class="text-gray-600 dark:text-gray-400 mr-1">weight:</span>
          {{ cartItem.options.weight_name }}
          <!-- weight: {{ cartItem.options.weight }} -->
        </div>
      </div>
    </div>
  </th>

  <td class="px-4 py-3">
    {{ cartItem.qty }}
    <div class="flex items-center justify-center border my-border-gray">
      <span class="px-2 cursor-pointer" @click="decrement">&mdash;</span>
      <input type="text" :value="form.qty" class="w-12 h-7 text-center border-none bg-white dark:bg-transparent" />
      <span class="px-2 cursor-pointer" @click="increment">&#xff0b;</span>
    </div>
    <!-- <input id="qty" v-model="form.qty" type="number" min="1" name="qty" /> -->
  </td>
                  
  <td class="px-4 py-3 text-gray-900 dark:text-white">
    <p class="font-semibold mb-2 whitespace-nowrap">{{ cartItem.options.totalQty }} FCFA</p>
    <p class="text-gray-600 dark:text-gray-400 whitespace-nowrap">{{ cartItem.price }} FCFA each</p>
  </td>

  <td class="px-4 py-3">
    <div>
      <Link :href="route('cart.destroy', {cart: cartItem.rowId})" method="DELETE" as="btn" class="">
        <Button label="delete" hasicon rounded danger extrasmall>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
          </svg>
        </Button>
      </Link>
    </div>
    <!-- <div class="hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </div> -->
  </td>
</template>

<script setup>
import Button from '@/Components/button.vue'
import { useForm, Link } from '@inertiajs/vue3'


defineProps({
  cartItem: Object,
  cartnb: String,
})

const form = useForm({
  qty: 1,
})

// const checkout = () => form.cartItem('/checkout')
const decrement = () => {
  if(form.qty >= 2)
    form.qty--
}
const increment = () => form.qty++
</script>