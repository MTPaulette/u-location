<template>
  <th scope="row" class="px-4 py-3 capitalize font-medium text-gray-900 dark:text-white">
    <div class="w-full flex items-center justify-center">
      <div v-if="cartItem.options.images" class="w-16 sm:w-20">
        <img :src="cartItem.options.images.src" alt="product image" class="w-full h-14 sm:h-16" />
      </div>
      <div class="w-full pl-3">
        <h4 class="w-5/6 truncate h-5 mb-1">
          <Link :href="route('product.show', {product: cartItem.options.product.id})" class="text-base hover:text-sheet-100">{{ cartItem.name }}</Link>
        </h4>
      
        <div class="h-10 md:h-8 w-full relative overflow-hidden text-justify text-sm md:text-xs mb-2 text-gray-700 dark:text-gray-400">
          <p class="content" v-html="cartItem.options.description" />
        </div>
    

        <div class="flex items-center truncate">
          <span class="text-gray-600 dark:text-gray-400 mr-1">weight:</span>
          {{ cartItem.options.weight_name }}
        </div>
      </div>
    </div>
  </th>

  <td class="px-4 py-3">
    <div class="flex items-center justify-center border my-border-gray">
      <span class="px-2 cursor-pointer" @click="decrement">&mdash;</span>
      <input type="text" :value="form.qty" class="w-12 h-7 text-center border-none bg-white dark:bg-transparent" @blur="changeQty" />
      <span class="px-2 cursor-pointer" @click="increment">&#xff0b;</span>
    </div>
  </td>
                  
  <td class="px-4 py-3 text-gray-900 dark:text-white">
    <p class="font-semibold mb-2 whitespace-nowrap"> <Price :value="cartItem.options.totalPrice" /> </p>
    <p class="text-gray-600 dark:text-gray-400 whitespace-nowrap"><Price :value="cartItem.price" /> each</p>
  </td>

  <td class="px-4 py-3">
    <div>
      <Link :href="route('cart.destroy', {cart: cartItem.rowId})" method="DELETE" as="btn">
        <div class="hover:text-danger">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
          </svg>
        </div>
      </Link>
    </div>
  </td>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import Price from '@/Components/Price.vue'


const props = defineProps({
  cartItem: Object,
  cartcount: String,
})

const form = useForm({
  qty: props.cartItem.qty,
})


const updateQty = () => {
  form.put(
    route('cart.update', {cart: props.cartItem.rowId}),
  )
}

const decrement = () => {
  if(form.qty >= 2) {
    form.qty--
    updateQty()
  }
}
const increment = () => {
  let remaining_stock = props.cartItem.options.remaining_stock
  if(form.qty < remaining_stock) {
    form.qty++
  }
  else {
    form.qty = remaining_stock
  }
  // form.qty++
  updateQty()
}

const changeQty = (e) => {
  console.log("==========================================")
  let qty = e.target.value
  let remaining_stock = props.cartItem.options.remaining_stock
  if(qty < remaining_stock) {
    form.qty = qty
  }
  else {
    form.qty = remaining_stock
  }
  updateQty()
}

</script>