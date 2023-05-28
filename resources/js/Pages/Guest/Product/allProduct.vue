<template>
  <MainLayout :informations="informations">
    <pageTitle title="blog" />
    <div class="ml-3">
      <myTitle title="Tous les produits" />
    </div>
    <div class="mycontainer sm:px-20 md:px-7">
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-14">
        <div class="col-span-3 md:col-span-3">
          <div v-for="product in products.data" :key="product.id">
            <Link :href="route('product.show', {product: product.id})">
              <productCard :product="product" />
            </Link>
          </div>
        </div>

        <div class="hidden md:block md:col-span-2 h-full md:px-4 py-8 md:mb-16 border-0 rounded border-gray-100">
          <div class="md:flex justify-center min-w-[200px]">
            <div class="w-full min-w-[204px] h-3/6">
              <!-- <div class="flex-shrink-0 bg-white border-2 border-mango rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700"> -->
              <img v-if="products.data[selectedImage].images.length" class="w-full min-w-[200px] h-40 bg-white border-2 border-mango rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700" :src="getImgUrl(products.data[selectedImage].images[0].filename)" />
              <!-- </div> -->
              <div class="flex justify-center w-full mt-7">
                <div v-for="(product, i) in products.data" :key="product.id" class="h-auto w-auto" @click="selectedImage=i">
                  <img v-if="product.images.length" class="border-2 w-12 h-12 mx-1" :class="selectedImage==i?'border-mango': 'border-sheet-100'" :src="getImgUrl(product.images[0].filename)" />
                </div>
              </div>
            </div>
          </div>
          <div class="flex justify-center items-center w-full h-36 mt-20 border border-gray-100 bg-gray-300 ">
            pub
          </div>
        </div>
      </div>
    </div>
    <div v-if="products.data.length" class="w-full flex justify-center mt-8 pb-12">
      <pagination :links="products.links" />
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import productCard from '@/Components/productCard.vue'
import pagination from '@/Components/pagination.vue'
import myTitle from '@/Components/myTitle.vue'

defineProps({
  products: Object,
  informations: Object,
})

const selectedImage = ref(0)

const getImgUrl = (src) =>{
  return  new URL('./../../../../../public/storage/'+src, import.meta.url).href
}
</script>