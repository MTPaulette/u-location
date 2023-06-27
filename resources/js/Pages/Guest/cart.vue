<template>
  <MainLayout>
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
      <Cart 
        :cart-items="cartItems" 
        :cartcount="cartcount"
        :subtotal="subtotal"
      />
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import Cart from '@/Components/Cart/cart.vue'

defineProps({
  cartItems: Object,
  cartcount: String,
  subtotal: String,
})
</script>
