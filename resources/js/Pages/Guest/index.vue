<template>
  <IndexLayout>
    <pageTitle title="home" />
    <!-- <div class="w-full bg-gray-100 dark:bg-gray-700"> -->
    <div class="w-full">
      <div class="mx-3 sm:ml-56 h-auto sm:min-h-[400px]">
        <div class="flex">
          <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat,
            culpa! Corporis vel totam suscipit quidem obcaecati recusandae eligendi dignissimos
            inventore molestiae quam error eum adipisci magnam, dicta repellendus eos molestias?
          </div>
          <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat,
            culpa! Corporis vel totam suscipit quidem obcaecati recusandae eligendi dignissimos
            inventore molestiae quam error eum adipisci magnam, dicta repellendus eos molestias?
          </div>
        </div>
      </div>
    </div>
    <!-- our products -->
    <div class="flex flex-col items-center w-full py-12 px-3 sm:px-12 md:px-14">
      <div class="w-full">
        <sectionTitle title="Our Products" class="title" />
      </div>
      
      <div class="grid grid-cols-1 sm:grid-cols-1 justify-between w-full">
        <div v-for="product in products" :key="product.id" class="h-full">
          <Link :href="route('product.show', {product: product.id})">
            <productCard :product="product" />
          </Link>
        </div>
      </div>
    </div>

    <!--from our blog -->
    <div class="flex flex-col items-center w-full py-12 px-3 sm:px-12 md:px-14 bg-gray-50 dark:bg-gray-900">
      <div class="w-full">
        <sectionTitle title="From Our Blog" class="title" />
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-1 justify-between w-full">
        <div v-for="post in posts" :key="post.id" class="w-full">
          <Link :href="route('post.show', {post: post.id})">
            <postCard :post="post" />
          </Link>
        </div>
      </div>
    </div>
    <!-- <Streamer /> -->
  </IndexLayout>
</template>

<script setup>
import IndexLayout from '@/Layouts/IndexLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import postCard from '@/Components/postCard.vue'
import productCard from '@/Components/productCard.vue'
// import myTitle from '@/Components/myTitle.vue'
import sectionTitle from '@/Components/sectionTitle.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  posts: Object,
  products: Object,
})
</script>