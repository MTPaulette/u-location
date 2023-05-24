<template>
  <MainLayout :informations="informations">
    <div>
      <pageTitle title="blog details" />
      <div class="mycontainer">
        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8 lg:gap-14">
          <div class="col-span-3 md:col-span-2">
            <div v-if="post.images.length" class="mb-8 mt-0">
              <myCarousel :images="post.images" />
            </div>

            <div>
              <myTitle :title="post.title" />
              <!-- <h2 class="mt-6 mb-3 font-bold text-xl md:text-2xl capitalize text-black dark:text-gray-100 ">{{ post.name }}</h2> -->
              <div class="overflow-hidden border-b border-gray-100 pb-5 mb-6">
                <div class="flex text-sm text-gray-600 dark:text-gray-100">
                  <a href="#" class="flex items-center border-r-2 border-gray-100 px-4 capitalize cursor-text">
                    <span class=" mr-1 text-sheet-100">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                      </svg>
                    </span>
                    <span v-if="post.user.role_id === 1">By Admin</span>
                    <span v-else>By {{ post.user.lastname }}</span>
                  </a>
                  <a href="#" class="flex items-center border-r-2 border-gray-100 px-4 cursor-text">
                    <span class=" mr-1 text-sheet-100 pointer-events-none">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                      </svg>
                    </span>
                    {{ post.created_at }}
                  </a>
                  <a href="#" class="flex items-center px-4 cursor-text">
                    <span class=" mr-1 text-sheet-100 pointer-events-none">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z" />
                      </svg>
                    </span>
                    comment
                  </a>
                </div>
              </div>
            </div>


            <div>
              <p class="text-base text-gray-700 dark:text-gray-50">
                {{ post.content }}
              </p>
            </div>
          </div>

          <div class="md:px-4 py-8 md:mb-16 border-0 lg:border rounded border-gray-100">
            <div class="relative hidden md:block">
              <!-- search -->
              <searchBar />
            </div>

            <!-- themes -->
            <div class="mt-6 relative hidden md:block">
              <div>
                <CategoryList title="Categories" :themes="themes" />
              </div>
            </div>

            <!-- articles populaires -->
            <div class="mt-6">
              <div>
                <sectionTitle title="articles populaires" />
              </div>
              <div v-for="popularPost in popularPosts" :key="popularPost.id">
                <Link :href="route('post.show', {post: popularPost.id})">
                  <postCard :post="popularPost" />
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import sectionTitle from '@/Components/sectionTitle.vue'
import searchBar from '@/Components/searchSubmit.vue'
import myCarousel from '@/Components/myCarousel.vue'
import postCard from '@/Components/postCard.vue'
import myTitle from '@/Components/myTitle.vue'
import { Link } from '@inertiajs/vue3'
import CategoryList from '@/Components/categoryList.vue'

defineProps({
  post: Object,
  themes: Object,
  popularPosts: Object,
  informations: Object,
})
</script>