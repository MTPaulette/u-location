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

      <!-- <div v-for="product in products" :key="product.id" class="relative w-1/2 md:w-1/3 lg:w-1/4 h-full"> -->
      <!-- <div class="flex justify-between w-full overflow-x-scroll over-x">
        <div v-for="product in products" :key="product.id" class="relative w-1/2 md:w-[225px] h-full">
          <Link :href="route('product.show', {product: product.id})">
            <productIndexCard :product="product" />
          </Link>
        </div>
      </div> -->

      <!-- <div class="flex justify-between w-full flex-wrap overflow-x-scroll over-y h-[510px] md:overflow-x-hidden md:h-[250px]">
        <div v-for="product in products" :key="product.id" class="relative w-1/2 md:w-[225px] h-1/2 md:h-full">
          <Link :href="route('product.show', {product: product.id})">
            <productIndexCard :product="product" />
          </Link>
        </div>
      </div> -->

      <div class="flex justify-start md:justify-between lg:justify-start w-full flex-wrap overflow-x-hidden over-y h-[520px]">
        <!-- <div v-for="product in products" :key="product.id" class="relative w-1/2 sm:w-[225px] lg:1/5 h-1/2"> -->
        <div v-for="product in products" :key="product.id" class="relative w-1/2 sm:bg-transparent sm:w-1/3 md:max-w-[225px] lg:w-1/4 xl:w-1/5  h-1/2">
          <Link :href="route('product.show', {product: product.id})">
            <productIndexCard :product="product" />
          </Link>
        </div>
      </div>

      <!-- <div class="flex justify-between w-full overflow-x-scroll over-x">
        <div v-for="product in products" :key="product.id" class="relative w-1/2 md:w-[225px] h-full">
          <Link :href="route('product.show', {product: product.id})">
            <productIndexCard :product="product" />
          </Link>
        </div>
      </div>

      <div class="flex justify-between w-full flex-wrap overflow-x-scroll over-y h-[510px]">
        <div v-for="product in products" :key="product.id" class="relative w-1/2 md:w-1/3 lg:w-1/4 h-1/2">
          <Link :href="route('product.show', {product: product.id})">
            <productIndexCard :product="product" />
          </Link>
        </div>
      </div> -->
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
import productIndexCard from '@/Components/productIndexCard.vue'
// import myTitle from '@/Components/myTitle.vue'
import sectionTitle from '@/Components/sectionTitle.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  posts: Object,
  products: Object,
})
</script>