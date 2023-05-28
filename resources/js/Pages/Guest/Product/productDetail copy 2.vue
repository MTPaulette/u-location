<template>
  <MainLayout :informations="informations">
    <div>
      <pageTitle title="blog details" />
      <div class="mycontainer">
        <div class="grid grid-cols-1 md:grid-cols-6 md:gap-10 md:px-28">
          <div v-if="product.images.length" class="col-span-2 mb-8 mt-0">
            <!-- <myCarousel :images="product.images" /> -->
            <img class="rounded-lg w-full h-56 overflow-hidden md:h-72" :src="getImgUrl(product.images[selectedImage].filename)" />
            <div class="flex flex-wrap gap-2 bg-sheet-50 justify-center w-full mt-7">
              <div v-for="(image, i) in product.images" :key="image.id" class="w-16 h-14 md:w-24 md:h-20" @click="selectedImage=i">
                <!-- <div v-for="(image, i) in product.images" :key="image.id" class="h-auto w-auto" @click="selectedImage=i"> -->
                <img class="border-2 rounded w-full h-full" :class="selectedImage==i?'border-mango': 'border-sheet-100'" :src="getImgUrl(image.filename)" />
              </div>
            </div>
          </div>

          <div class="col-span-3">
            <!-- <div class="col-span-3 bg-gray-50 dark:bg-gray-600"> -->
            <myTitle :title="product.name" class="uppercase text-white bg-black text-center p-2" />
            <!-- <h2 class="mt-6 mb-3 font-bold text-xl md:text-2xl capitalize text-black dark:text-gray-100 ">{{ product.name }}</h2> -->
            <div class="overflow-hidden border-b border-gray-100 pb-5 mb-6">
              <div class="flex my-4 text-gray-600 dark:text-gray-100">
                <div
                  v-for="weight in product.weights" 
                  :key="weight.id"
                  class="border-r-2 border-gray-100 px-4 capitalize cursor-text"
                >
                  <p>weight: <span class="text-black dark:text-white font-extrabold">{{ weight.name }}</span></p>
                  <p>Stock: <span class="text-black dark:text-white font-extrabold">{{ weight.pivot.remaining_stock }}</span></p>
                  <p>Price: <span class="text-sheet-100 font-extrabold">{{ weight.pivot.price }} XAF</span></p>
                </div>
              </div>
              <p class="font-medium text-justify">
                {{ product.description }}
              </p>
            </div>

            <div class="overflow-hidden border-b border-gray-100 pb-5 mb-4">
              <span class="font-bold text-base mr-2">Composition:</span>
              <span v-for="ingredient in product.ingredients" :key="ingredient.id" class="text-onion-200 font-bold px-1">
                {{ ingredient.name }},
              </span>
            </div>
            <!-- <div class="mt-2"> -->
                
            <div class="overflow-hidden border-b border-gray-100 pb-5 mb-4">
              <span class="font-bold text-base">Preparation:</span>
              <p class="font-medium text-justify">
                {{ product.preparation }}
              </p>
            </div>

            <div class="overflow-hidden border-b border-gray-100 pb-5 mb-6">
              <div class="p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <UlList title="Some advantages" :lists="product.advantages" />
              </div>
            </div>

            <div class="overflow-hidden border-b border-gray-100 pb-5 mb-4">
              <span class="font-bold text-base">Utilisation:</span>
              <p class="font-medium text-justify">
                {{ product.utilisation }}
              </p>
            </div>
          </div>

          <div class="col-span-1">
            {{ product.weights }}
          </div>
        </div>
      </div>
    </div>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas nemo ipsa non hic ea exercitationem nihil eligen
    di, ullam, dolore vel ab tempora itaque reprehenderit? Nisi vel nemo exercitationem voluptatum inventore!
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