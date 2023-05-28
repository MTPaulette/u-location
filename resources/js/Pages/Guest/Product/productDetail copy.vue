<template>
  <MainLayout :informations="informations">
    <div>
      <pageTitle title="blog details" />
      <div class="mycontainer md:px-10 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 border-b border-gray-100 pb-5 mb-4">
          <div v-if="product.images.length" class="mb-8 mt-0 order-2 sm:order-1">
            <div class="flex justify-center w-full h-56 sm:h-64 md:h-72">
              <img class="w-full max-w-[400px] h-full shadow-lg rounded-lg shadow-gray-500" :src="getImgUrl(product.images[selectedImage].filename)" />
            </div>
            <div class="flex flex-wrap gap-2 justify-center w-full mt-7">
              <div v-for="(image, i) in product.images" :key="image.id" class="w-16 h-14 md:w-20 md:h-16" @click="selectedImage=i">
                <!-- <div v-for="(image, i) in product.images" :key="image.id" class="h-auto w-auto" @click="selectedImage=i"> -->
                <img class="border-2 rounded w-full h-full" :class="selectedImage==i?'border-mango': 'border-sheet-100'" :src="getImgUrl(image.filename)" />
              </div>
            </div>
          </div>

          <div class="order-1 sm:order-2">
            <myTitle :title="product.name" class="uppercase text-white bg-black text-center p-2" />
            <div class="border-b border-gray-100 pb-5 mb-6">
              <div class="flex flex-wrap gap-2 justify-center w-full my-4 sm:my-7 text-gray-600 dark:text-gray-100">
                <div
                  v-for="weight in product.weights" 
                  :key="weight.id"
                  class="capitalize cursor-text w-[150px]"
                >
                  <p>weight: <span class="text-black dark:text-white font-extrabold">{{ weight.name }}</span></p>
                  <p>Price: <span class="text-sheet-50 font-extrabold">{{ weight.pivot.price }} XAF</span></p>
                  <p v-if="weight.pivot.remaining_stock == 0"><span class="text-red-600 text-sm">not available</span></p>
                  <!-- <p>Stock: <span class="text-black dark:text-white font-extrabold">{{ weight.pivot.remaining_stock }}</span></p> -->
                </div>
              </div>
              <p class="font-medium text-justify hidden md:block">
                {{ product.description }}
              </p>
            </div>
          </div>
        </div>
        <div class="w-full pb-8">
          <p class="font-medium text-justify md:hidden block">
            {{ product.description }}
          </p>
          <!-- composition -->
          <div class="border-b border-gray-100 pb-5 mb-4">
            <sectionTitle title="Composition" />

            <span v-for="ingredient in product.ingredients" :key="ingredient.id" class="px-1">
              {{ ingredient.name }},
            </span>

            <!-- <UlList title="Composition" :lists="product.ingredients" /> -->
          </div>

          <!-- preparation -->
          <div class="border-b border-gray-100 pb-5 mb-4">
            <sectionTitle title="Preparation" />
            <p class="font-medium text-justify">
              {{ product.preparation }}
            </p>
          </div>

          <!-- advantage -->
          <div class="border-b border-gray-100 pb-5 mb-6">
            <sectionTitle title="Advantages" />
            <div class="p-4 mb-4 text-green-900 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
              <UlList title="Some advantages" :lists="product.advantages" />
            </div>
          </div>

          <!-- utilisation -->
          <div class="pb-5 mb-4">
            <sectionTitle title="Utilisation" />
            <p class="font-medium text-justify">
              {{ product.utilisation }}
            </p>
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
// import myCarousel from '@/Components/myCarousel.vue'
import productCard from '@/Components/productCard.vue'
import myTitle from '@/Components/myTitle.vue'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import UlList from '@/Components/ulList.vue'

defineProps({
  product: Object,
  themes: Object,
  popularProducts: Object,
  informations: Object,
})

const selectedImage = ref(0)

const getImgUrl = (src) =>{
  return  new URL('./../../../../../public/storage/'+src, import.meta.url).href
}
</script>