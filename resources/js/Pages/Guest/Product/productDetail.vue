<template>
  <MainLayout :informations="informations">
    <div>
      <pageTitle title="blog details" />
      <div class="mycontainer md:px-10 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 border-b border-gray-100 pb-5 mb-4">
          <myTitle :title="product.name" class="uppercase md:hidden block text-white bg-black text-center p-2" />
          <div v-if="product.images.length" class="mb-2 md:mb-8 mt-0">
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

          <!-- <div class="order-1 sm:order-2"> -->
          <div>
            <myTitle :title="product.name" class="uppercase hidden md:block text-white bg-black text-center p-2" />
            <div class="pb-2 md:pb-5 mb-0 md:mb-6">
              <!-- <div class="border-b border-gray-100 pb-5 mb-0 md:mb-6"> -->
              <div class="flex flex-wrap gap-2 justify-center w-full my-4 sm:my-7 text-gray-600 dark:text-gray-100">
                <div
                  v-for="weight in product.weights" 
                  :key="weight.id"
                  class="capitalize cursor-text w-[150px]"
                >
                  <p>weight: <span class="text-black dark:text-white font-extrabold">{{ weight.name }}</span></p>
                  <p>Price: <span class="text-sheet-50 font-extrabold">{{ weight.pivot.price }} XAF</span></p>
                  <p v-if="weight.pivot.remaining_stock == 0"><span class="text-red-600 text-sm">not available</span></p>
                </div>
              </div>
              <p class="font-medium text-justify border-b border-gray-100 pb-5 mb-4">
                {{ product.description }}
              </p>
              <!-- weight -->
              <div class="">
                <p class="font-semibold">Products added to the basket</p>
                <div class="text-base" role="alert">
                  <ul class="my-4 list-disc list-inside text-gray-500 dark:text-gray-400">
                    <li v-for="(selectedWeight, i) in form.weights" :key="i" class="flex justify-between bg-green-50 border rounded-lg border-green-200 mb-2">
                      <div class="flex items-center">
                        <p class="border-gray-300 border-r-2 px-10">Weight: <span class="ml-3 text-gray-900">{{ product.weights[selectedWeight.weight_id].name }}</span></p>
                        <p class="px-10">Qty: <span class="ml-3 text-gray-900">{{ selectedWeight.qty }}</span></p>
                      </div>
                      <div @click="removeWeightQty(i)">
                        <button type="button" class="text-gray-900 hover:text-red-600 text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                          </svg>
                        </button>
                      </div>
                    </li>
                  </ul>
                </div>
              

                <!-- <div class=""> -->
                <div class="px-1 lg:px-10">
                  form.weight_id:   {{ form.weight_id }}
                  <form class="flex justify-around md:justify-between items-end" @submit.prevent="addToCart">
                    <!-- <div class="col-span-3 sm:col-span-1"> -->
                    <div class="">
                      <label for="weight" class="label mb-1">Weight</label>
                      <select id="weight" v-model="weightIndex" name="weight" class="w-24 py-1 text-center border-t border-b border-gray-200 dark:border-gray-700 bg-gray-50" @click="initialiseForm()">
                        <!-- <select id="weight" v-model="form.weight_id" name="weight" class="w-24 h-8 text-center border-t border-b border-gray-200 dark:border-gray-700 bg-gray-50"> -->
                        <option v-for="(weight, i) in product.weights" :key="weight.id" :value="i">
                          {{ weight.name }}
                          <!-- <input v-model="form.price" :value="weight.pivot.price" type="text" class="sr-only" />
                          <input v-model="form.remaining_stock" :value="weight.pivot.remaining_stock" type="text" class="sr-only" /> -->
                        </option>
                      </select>
                    </div>
                    <div>
                      <label for="qty" class="label mb-1">Qty</label>
                      <div class="flex items-center justify-center border border-gray-200 dark:border-gray-700">
                        <span class="px-2 cursor-pointer" @click="decrement">&mdash;</span>
                        <input type="text" :value="form.qty" readonly class="w-12 h-8 text-center border-none bg-gray-50" />
                        <span class="px-2 cursor-pointer" @click="increment">&#xff0b;</span>
                      </div>
                    </div>
                    <!-- <div @click="addWeightQty"> -->
                    <!-- <div class="btn-default btn-success btn-small inline-flex items-center capitalize font-medium text-white rounded-lg focus:ring-4 focus:outline-none">add to cart</div> -->
                    <Button label="add to cart" type="submit" rounded success small />
                    <!-- </div> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="w-full pb-8">
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
import myTitle from '@/Components/myTitle.vue'
import { ref } from 'vue'
import UlList from '@/Components/ulList.vue'
import Button from '@/Components/button.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  product: Object,
  themes: Object,
  popularProducts: Object,
  informations: Object,
})

const  weightIndex = ref(0)

const form = useForm({
  product: props.product,
  // product_id: '',
  weight_id: null,
  qty: 1,
  price: null,
  remaining_stock: null,
})



const selectedImage = ref(0)

const getImgUrl = (src) =>{
  return  new URL('./../../../../../public/storage/'+src, import.meta.url).href
}


const initialiseForm = () => {
  const i = weightIndex.value
  console.log("===================================")
  console.log(i)
  form.weight_id = props.product.weights[i].id
  form.price = props.product.weights[i].pivot.price
  form.remaining_stock = props.product.weights[i].pivot.remaining_stock
}


const addToCart = () => {
  form.post('/cart')
}


const decrement = () => {
  if(form.qty >= 2)
    form.qty--
}
const increment = () => {
  form.qty = form.qty+1
}
</script>