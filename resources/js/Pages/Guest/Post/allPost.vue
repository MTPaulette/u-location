<template>
  <pageTitle title="blog" />
  <div class="ml-3">
    <myTitle title="Tous les articles" />
  </div>
  <div class="mycontainer sm:px-20 md:px-7">
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-14">
      <div class="col-span-3 md:col-span-2">
        <div v-for="post in posts.data" :key="post.id">
          <Link :href="route('post.show', {post: post.id})">
            <postCard :post="post" />
          </Link>
        </div>
      </div>

      <div class="hidden md:flex justify-center min-w-[200px] h-full md:px-4 py-8 md:mb-16 border-0 rounded border-gray-100">
        <div class="w-full min-w-[204px] h-3/6">
          <div class="flex-shrink-0 bg-white border-2 border-sheet-100 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <img class="rounded w-full min-w-[200px] h-40" src="./../../../../images/carousel/3.jpg" alt="product image" />
          </div>

          <div class="flex justify-between w-full mt-7">
            <img class="border-2 border-sheet-100 w-12 h-12" src="./../../../../images/carousel/3.jpg" alt="product image" />
            <img class="border-2 border-sheet-100 w-12 h-12" src="./../../../../images/carousel/3.jpg" alt="product image" />
            <img class="border-2 border-sheet-100 w-12 h-12" src="./../../../../images/carousel/3.jpg" alt="product image" />
            <img class="border-2 border-sheet-100 w-12 h-12" src="./../../../../images/carousel/3.jpg" alt="product image" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-if="posts.data.length" class="w-full flex justify-center mt-8 mb-12">
    <pagination :links="posts.links" />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import postCard from '@/Components/postCard.vue'
import pagination from '@/Components/pagination.vue'
import myTitle from '@/Components/myTitle.vue'

defineProps({
  posts: Object,
})
</script>

<script>
import MainLayout from '@/Layouts/MainLayout.vue'

export default {
  layout: MainLayout,
}
</script>