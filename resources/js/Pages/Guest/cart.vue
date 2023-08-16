<template>
  <IndexLayout>
    <pageTitle title="cart" />
    <div class="mycontainer md:px-10 lg:px-14">
      <!-- <Cart 
        :cart-items="cartItems" 
        :cartcount="cartcount"
        :subtotal="subtotal"
        :carttaxrate="carttaxrate"
        :carttax="carttax"
        :total="total"
      /> -->
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
                  <tbody v-if="cartcount">
                    <tr v-for="cartItem in cartItems" :key="cartItem.rowId" class="bg-gray-50 border-b my-border-gray dark:bg-gray-800 hover:bg-white dark:hover:bg-gray-900">
                      <CartItem :cart-item="cartItem" />
                    </tr>
                  </tbody>
                  <div v-else>
                    <p class="my-8 text-xl md:text-2xl px-4">Aucun product ajoute au pannier</p>
                  </div>
                </table>
              </div>
            </form>
            <div class="flex items-center justify-between mt-6 mb-4">
              <div>
                <a href="/product">
                  <Button label="continue market" hasicon light rounded small>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                  </Button>
                </a>
              </div>
              <div v-if="cartcount">
                <Link :href="route('cart.clear')" method="DELETE" as="btn">
                  <Button label="clear cart" hasicon rounded danger small>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </Button>
                </Link>
              </div>
            </div>
          </div>

          <!-- free delivery -->
          <div class="flex p-4 mt-8 mb-28 text-sm text-green-800 border border-green-100 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800">
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
        <div v-if="cartcount" class="col-span-1 mb-10 lg:mb-0 order-1 lg:order-2">
          <div class="w-full px-4 py-3 border rounded-lg my-border-gray ">
            <div class="flex justify-between mb-2">
              <p>Cart subtotal</p>
              <p class="font-semibold text-sm mt-1 text-black dark:text-white">{{ formatPrice(subtotal) }}</p>
            </div>
        
            <div class="flex justify-between mb-2 items-center">
              <p>Discount</p>
              <p class="font-semibold text-sm text-black dark:text-white">30%</p>
            </div>

            <div class="flex justify-between mb-2">
              <p>Shipping charge</p>
              <p class="font-semibold text-sm text-black dark:text-white">free</p>
            </div>

            <div class="flex justify-between pb-6 border-b my-border-gray">
              <p>Cart total</p>
              <p class="font-bold px-1 bg-black text-white dark:text-white">{{ formatPrice(subtotal) }}</p>
            </div>
            <div class="mt-6">
              <Link href="/checkout">
                <Button label="checkout" success rounded small />
              </Link>
            </div>
          </div>
        </div>
      </div>
      <!-- <Cart 
        :cart-items="cartItems" 
        :cartcount="cartcount"
        :subtotal="subtotal"
      /> -->
    </div>
  </IndexLayout>
</template>

<script setup>
import IndexLayout from '@/Layouts/IndexLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import CartItem from '@/Components/cartItem.vue'
import Button from '@/Components/button.vue'
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

const formatPrice = (price) => {
  return price+" FCFA"
}
</script>
