<template>
  <MainLayout :informations="informations">
    <div>
      <pageTitle title="blog details" />
      <div class="mycontainer md:px-10 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 border-b my-border-gray pb-5 mb-4">
          <h2 class="title mb-4 uppercase md:hidden block text-white bg-black text-center p-2"> {{ product.name }} </h2>
          <!-- <myTitle :title="product.name" class="" /> -->
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
            <!-- <myTitle :title="product.name" class="uppercase hidden md:block text-white bg-black text-center p-2" /> -->
            <h2 class="title mb-4 uppercase hidden md:block text-white bg-black text-center p-2"> {{ product.name }} </h2>
            <div class="pb-2 md:pb-5 mb-0 md:mb-6">
              <div class="flex flex-wrap gap-2 justify-center w-full my-4 sm:my-7">
                <!-- <div class="flex flex-wrap gap-2 justify-center w-full my-4 sm:my-7 text-gray-600 dark:text-gray-100"> -->
                <div
                  v-for="weight in product.weights" 
                  :key="weight.id"
                  class="capitalize cursor-text w-[150px]"
                >
                  <p>weight: <span class="font-extrabold">{{ weight.name }}</span></p>
                  <p>Price: <span class="text-sheet-50 font-bold">{{ weight.pivot.price }} XAF</span></p>
                  <p v-if="weight.pivot.remaining_stock == 0"><span class="text-red-600 text-xs">not available</span></p>
                </div>
              </div>
              <div class="font-medium text-justify border-b my-border-gray pb-5 mb-4 text-gray-700 dark:text-gray-400">
                <p v-html="product.description" />
              </div>
              <!-- weight -->
              <div class="w-full">
                <p class="font-semibold mb-2 text-gray-900 dark:text-gray-200 ">Products added to the basket</p>
                <div>
                  <form class="flex flex-wrap gap-2 w-full justify-around md:justify-start items-end" @submit.prevent="addToCart">
                    <div class="block sm:flex items-center">
                      <label for="weight" class="label mb-1 mr-2">Weight:</label>
                      <select id="weight" v-model="weightIndex" name="weight" class="w-24 md:w-[90px] xl:w-24 py-1 text-center border-t border-b my-border-gray bg-gray-50 dark:bg-transparent" @click="initialiseForm()">
                        <!-- <select id="weight" v-model="form.weight_id" name="weight" class="w-24 h-8 text-center border-t border-b my-border-gray bg-gray-50"> -->
                        <option v-for="(weight, i) in product.weights" :key="weight.id" :value="i">
                          {{ weight.name }}
                        </option>
                      </select>
                    </div>
                    <div class="block sm:flex items-center">
                      <label for="qty" class="label mb-1 mr-2">Qty:</label>
                      <div class="flex items-center justify-center border my-border-gray">
                        <span class="px-2 cursor-pointer" @click="decrement">&mdash;</span>
                        <!-- <input type="text" :value="form.qty" class="w-12 md:w-10 xl:w-12 h-8 text-center border-none bg-gray-50 dark:bg-transparent" /> -->
                        <input type="text" :value="form.qty" readonly class="w-12 md:w-10 xl:w-12 h-8 text-center border-none bg-gray-50 dark:bg-transparent" />
                        <span class="px-2 cursor-pointer" @click="increment">&#xff0b;</span>
                      </div>
                    </div>
                    <Button label="add to cart" type="submit" rounded success small :disabled="!canUpload" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="w-full pb-8">
          <!-- composition -->
          <div class="border-b my-border-gray pb-5 mb-4">
            <sectionTitle title="Composition" />

            <span v-for="ingredient in product.ingredients" :key="ingredient.id" class="px-1">
              {{ ingredient.name }},
            </span>

            <!-- <UlList title="Composition" :lists="product.ingredients" /> -->
          </div>

          <!-- preparation -->
          <div class="border-b my-border-gray pb-5 mb-4">
            <sectionTitle title="Preparation" orange />
            <p class="font-medium text-justify">
              {{ product.preparation }}
            </p>
          </div>

          <!-- advantage -->
          <div class="border-b my-border-gray pb-5 mb-6">
            <sectionTitle title="Advantages" green />
            <!-- <div class="px-2 py-4 -mt-2 text-green-900 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"> -->
            <div class="px-2 py-4 -mt-2">
              <UlList title="Some advantages" :lists="product.advantages" />
            </div>
          </div>

          <!-- utilisation -->
          <div class="pb-5 mb-4">
            <sectionTitle title="Utilisation" yellow />
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
import { useForm, router } from '@inertiajs/vue3'
import NProgress from 'nprogress'

const props = defineProps({
  product: Object,
  themes: Object,
  popularProducts: Object,
  informations: Object,
})

//progress bar for images upload
router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})

const  weightIndex = ref()
const canUpload = ref(false)

const form = useForm({
  product: props.product,
  // product_id: '',
  weight_id: null,
  weight: '',
  qty: 1,
  price: null,
  remaining_stock: null,
  totalQty: 0,
})

const selectedImage = ref(0)

const getImgUrl = (src) =>{
  return  new URL('./../../../../../public/storage/'+src, import.meta.url).href
}


const initialiseForm = () => {
  const i = weightIndex.value
  console.log("===================================")
  console.log(i)
  if(i != undefined) {
    form.weight_id = props.product.weights[i].id
    form.weight = props.product.weights[i].name
    form.price = props.product.weights[i].pivot.price
    form.remaining_stock = props.product.weights[i].pivot.remaining_stock

    form.totalQty = form.qty
    if(form.price != undefined) {
      canUpload.value = true
    }
  }
}


const addToCart = () => {
  // form.post('/cart');
  form.post(
    route('cart.store'),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}



const decrement = () => {
  if(form.qty >= 2)
    form.qty--
}
const increment = () => {
  form.qty = form.qty+1
}
</script>