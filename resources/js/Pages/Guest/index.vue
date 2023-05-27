<template>
  <IndexLayout :informations="informations" :categories="categories">
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
        <h2 class="font-semibold text-2xl md:text-3xl dark:text-gray-100">Our Products </h2>
        <span class="h-[4px] bg-onion-200 w-12 inline-block" />
      <!-- <p class="text-sm font-medium text-gray-700 dark:text-black">You can find more products in our store <a href="/post" class="text-mango hover:underline dark:text-mango">there.</a></p> -->
      </div>
      <!-- Carousel data-carousel="slide" -->
      <div id="indicators-carousel" class="relative h-40 w-full bg-pink-50 mt-6" data-carousel="slide">
        <!-- <div class="relative h-40 flex justify-between items-center bg-pineapple w-full">
          <div class="hidden duration-700 ease-in-out bg-info" data-carousel-item>
            <div class="absolute block bg-danger w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
              <div class="grid grid-cols-4 gap-4 w-full h-full bg-purple-200">
                <div v-for="post in posts" :key="post.id" class="w-full h-full bg-purple-700">
                  <Link :href="route('post.show', {post: post.id})">
                    <productCard :post="post" />
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="relative h-40 flex justify-between items-center bg-mango w-full">
          <div v-for="post in posts" :key="post.id" class="hidden duration-700 ease-in-out h-full" data-carousel-item>
            <div class="absolute block bg-purple-100 w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
              <div class="grid grid-cols-4 h-full">
                <div v-for="postI in posts" :key="postI.id" class="bg-danger h-full">
                  <Link :href="route('post.show', {post: postI.id})">
                    <productCard :product="postI" />
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="relative h-40 flex justify-between items-center bg-mango w-full">
          <div v-for="post in posts" :key="post.id" class="hidden duration-700 ease-in-out flex flex-wrap" data-carousel-item>
            <Link :href="route('post.show', {post: post.id})" class="absolute block bg-danger w-1/4 h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
              <productCard :post="post" />
            </Link>
          </div>
        </div> -->
        <!-- <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
          <div v-for="image in images" :key="image.id" class="hidden duration-700 ease-in-out" data-carousel-item>
            <img :src="getImgUrl(image.filename)" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
          </div>
        </div> -->

        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sheet-100/30 dark:bg-gray-800/30 group-hover:bg-sheet-100/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            <span class="sr-only">Previous</span>
          </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            <span class="sr-only">Next</span>
          </span>
        </button>
      </div>
    </div>

    <!--from our blog -->
    <div class="flex flex-col items-center w-full py-12 px-3 sm:px-12 md:px-14 bg-gray-100 dark:bg-gray-700">
      <div class="w-full">
        <h2 class="font-semibold text-2xl md:text-3xl dark:text-gray-100"> From Our Blog </h2>
        <span class="h-[4px] bg-onion-200 w-12 inline-block" />
        <!-- <p class="text-sm font-medium text-gray-700 dark:text-black">You can find more articles in our blog <a href="/product" class="text-mango hover:underline dark:text-mango">there.</a></p> -->
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-1 justify-between w-full mt-6">
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
import { Link } from '@inertiajs/vue3'

defineProps({
  posts: Object,
  informations: Object,
  categories: Object,
})
</script>