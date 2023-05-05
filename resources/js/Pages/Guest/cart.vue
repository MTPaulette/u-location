<template>
  <MainLayout :informations="informations">
    <pageTitle title="cart" />
    <div class="px-2 sm:px-12 md:px-16 lg:px-32 py-16">
      <Cart :products="products" />
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import Cart from '@/Components/cart.vue'
defineProps({
  products: Object,
  informations: Object,
})
</script>
