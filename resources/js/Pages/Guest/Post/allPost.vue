<template>
  <pageTitle title="blog" />
  <div class="ml-4">
    <myTitle title="tous les articles" />
  </div>
  <div class="px-4 sm:px-20 md:px-30 container mx-auto">
    <div v-for="post in posts.data" :key="post.id">
      <Link :href="`post/${post.id}`">
        <popularPostCard :post="post" />
      </Link>
      <!-- {{ post }} -->
    </div>
    <div v-if="posts.data.length" class="w-full flex justify-center mt-8 mb-12">
      <pagination :links="posts.links" />
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import myTitle from '@/Components/myTitle.vue'
import popularPostCard from '@/Components/popularPostCard.vue'
import pagination from '@/Components/pagination.vue'

defineProps({
  posts: Object,
})
</script>