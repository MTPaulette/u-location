<template>
  <MainLayout :informations="informations">
    <pageTitle title="articles de categorie" />
    <div class="ml-3">
      <myTitle title="Articles de la categorie:" />
    </div>
    <div class="mycontainer sm:px-20 md:px-7">
      <myTitle class="text-gray-600" :title="'<<'+theme.name+'>>'" />
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-14">
        <div class="col-span-3 md:col-span-3">
          <div v-if="posts.data.length">
            <div v-for="post in posts.data" :key="post.id">
              <Link :href="route('post.show', {post: post.id})">
                <postCard :post="post" />
              </Link>
            </div>
          </div>
          <p v-else class="mt-5 text-gray-500">Aucun resultat</p>
        </div>

        <div class="hidden md:block md:col-span-2 h-full md:px-4 py-8 md:mb-16 border-0 rounded my-border-gray">
          <div class="md:flex justify-center min-w-[200px]">
            <div class="w-full min-w-[204px] h-3/6">
              <div>
                <ThemeList title="Categories" :themes="themes" />
              </div>
            </div>
          </div>
          <div class="flex justify-center items-center w-full h-36 mt-20 border my-border-gray bg-gray-300 ">
            pub
          </div>
        </div>
      </div>
    </div>
    <div v-if="posts.data.length" class="w-full flex justify-center mt-8 pb-12">
      <pagination :links="posts.links" />
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { Link } from '@inertiajs/vue3'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import postCard from '@/Components/postCard.vue'
import pagination from '@/Components/pagination.vue'
import myTitle from '@/Components/myTitle.vue'
import ThemeList from '@/Components/themeList.vue'

defineProps({
  posts: Object,
  theme: Object,
  themes: Object,
  informations: Object,
})
</script>