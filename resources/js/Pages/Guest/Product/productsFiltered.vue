<template>
  <MainLayout>
    <pageTitle title="articles de categorie" />
    <div class="ml-3 my-4">
      <h2 class="title">
        <span v-if="filters['q']">Recherche de: <span class="text-gray-500">{{ filters['q'] }}</span> </span> <br />
        <span v-if="filters['category']"> Suivant la categorie: <span class="text-gray-500"> {{ filters['category'] }}</span>.</span>
      </h2>
    </div>
    <div class="mycontainer sm:px-20 md:px-7">
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-14">
        <div class="col-span-3 md:col-span-3">
          <div v-if="products.data.length">
            <div v-for="product in products.data" :key="product.id">
              <Link :href="route('product.show', {product: product.id})">
                <productCard :product="product" />
              </Link>
            </div>
          </div>
          <p v-else class="my-8 text-xl md:text-2xl text-gray-500">Aucun resultat</p>
        </div>

        <div class="hidden md:block md:col-span-2 h-full md:px-4 py-8 md:mb-16 border-0 rounded my-border-gray">
          <div class="md:flex justify-center min-w-[200px]">
            <div class="w-full min-w-[204px] h-3/6">
              <div>
                <CategoryList title="Categories" />
              </div>
            </div>
          </div>
          <div class="flex justify-center items-center w-full h-36 mt-20 border my-border-gray bg-gray-300 ">
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
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import productCard from '@/Components/productCard.vue'
import pagination from '@/Components/pagination.vue'
import CategoryList from '@/Components/categoryList.vue'

import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const filters =  page.props.filters


defineProps({
  products: Object,
  category: Object,
})
</script>