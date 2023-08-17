<template>
  <MainLayout>
    <div>
      <pageTitle title="blog details" />
      <div class="mycontainer md:px-10 lg:px-20">
        <myTitle :title="product.name" class="uppercase md:hidden block text-white bg-black text-center p-2" />
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 border-b my-border-gray pb-5 mb-4 justify-center md:justify-start">
          <div v-if="product.images.length" class="mb-2 md:mb-8 mt-0 w-full overflow-x-hidden flex justify-center items-center md:block md:justify-start md:items-start md:gap-0">
            <div class="flex justify-center flex-shrink-0 relative w-full md:w-full h-56 sm:h-64 md:h-72 mb-0 md:mb-7">
              <img class="w-full md:max-w-[400px] h-full rounded-lg" :src="getImgUrl(product.images[selectedImage].filename)" /><div class="absolute right-0 top-0">
                <!-- <div class="flex-shrink-0 bg-black/755">
                  <img src="./../../../../images/naturel_white.png" class="h-12 w-14" />
                </div> -->
              </div>
            </div>
            
            <div class="over-y flex flex-col md:flex-row justify-center over-x w-20 sm:w-28 md:w-full h-56 sm:h-64 md:h-auto gap-1 items-end pr-1 md:pr-0 md:pb-1.5">
              <div v-for="(image, i) in product.images" :key="image.id" class="flex-shrink-0" @click="selectedImage=i">
                <img class="border-2 rounded w-12 h-10 sm:w-16 sm:h-14 lg:w-20 lg:h-16" :class="selectedImage==i?'border-mango': 'border-sheet-100'" :src="getImgUrl(image.filename)" />
              </div>
            </div>
          </div>

          <!-- <div class="order-1 sm:order-2"> -->
          <div>
            <myTitle :title="product.name" class="uppercase hidden md:block text-white bg-black text-center p-2" />
            <div class="pb-2 md:pb-5 mb-0 md:mb-6">
              <div class="flex flex-wrap gap-2 justify-center w-full my-4 sm:my-7">
                <div
                  v-for="weight in product.weights" 
                  :key="weight.id"
                  class="capitalize cursor-text w-[150px]"
                >
                  <p>weight: <span class="font-extrabold">{{ weight.name }}</span></p>
                  <p>Price: <span class="text-sheet-50 font-bold">{{ formatPrice(weight.pivot.price) }}</span></p>
                  <p v-if="weight.pivot.remaining_stock == 0"><span class="text-danger text-xs">not available</span></p>
                </div>
              </div>
              <p class="font-semibold text-justify border-y my-border-gray py-2 text-gray-900 dark:text-gray-200 w-full overflow-x-hidden">
                Categorie: <span class="text-sheet-50">{{ product.category.name }}</span>
              </p>
              <div class="font-medium text-justify border-b my-border-gray py-5 mb-4 text-gray-700 dark:text-gray-400 w-full overflow-x-hidden">
                <p class="content" v-html="product.description" />
              </div>
              <!-- weight -->
              <div class="w-full">
                <p class="font-semibold mb-2 text-gray-900 dark:text-gray-200 ">Products added to the basket</p>
                <div>
                  <form class="flex flex-wrap gap-2 w-full justify-start items-end" @submit.prevent="addToCart">
                    <div class="block sm:flex items-center">
                      <label for="weight" class="label mb-1 mr-2">Weight:</label>
                      <select id="weight" v-model="weightIndex" name="weight" class="w-24 md:w-[90px] xl:w-24 py-1 text-center border-t border-b my-border-gray bg-gray-50 dark:bg-transparent dark:focus:bg-gray-600" @click="initialiseForm()">
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
                        <input type="text" :value="form.qty" class="w-12 md:w-10 xl:w-12 h-8 text-center border-none bg-gray-50 dark:bg-transparent" @input="changeQty" />
                        <span class="px-2 cursor-pointer" @click="increment">&#xff0b;</span>
                      </div>
                    </div>
                    <div class="flex gap-2">
                      <Button label="add to cart" type="submit" rounded success small :disabled="!canUpload" />
                      <Link href="/cart">
                        <Button label="view cart" light rounded small />
                      </Link>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="w-full pb-8">
          <!-- composition -->
          <div v-if="product.ingredients.length" class="border-b my-border-gray pb-5 mb-4">
            <sectionTitle title="Composition" />

            <span v-for="ingredient in product.ingredients" :key="ingredient.id" class="px-1">
              {{ ingredient.name }},
            </span>
          </div>

          <!-- preparation -->
          <div v-if="product.preparation" class="border-b my-border-gray pb-5 mb-4">
            <sectionTitle title="Preparation" orange />
            <p class="font-medium text-justify">
              {{ product.preparation }}
            </p>
          </div>

          <!-- advantage -->
          <div v-if="product.advantages.length" class="border-b my-border-gray pb-5 mb-6">
            <sectionTitle title="Advantages" green />
            <div class="px-2 py-4 -mt-2">
              <UlList title="Some advantages" :lists="product.advantages" />
            </div>
          </div>

          <!-- utilisation -->
          <div v-if="product.utilisation" class="pb-5 mb-4">
            <sectionTitle title="Utilisation" yellow />
            <p class="font-medium text-justify">
              {{ product.utilisation }}
            </p>
          </div>
        </div>
      </div>
    </div>

    <div>
      <Streamer />
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
import Streamer from '@/Components/streamer.vue'
import { useForm, router, Link } from '@inertiajs/vue3'
import NProgress from 'nprogress'

const props = defineProps({
  product: Object,
  themes: Object,
  popularProducts: Object,
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
    if(form.price != undefined) {
      canUpload.value = true
    }
  }
}

const addToCart = () => {
  form.post(
    route('cart.store'),
  )
}


const decrement = () => {
  if(form.qty >= 2)
    form.qty--
}
const increment = () => {
  if(form.qty < form.remaining_stock) {
    form.qty = form.qty+1
  }
  else {
    form.qty = form.remaining_stock
  }
  // form.qty = form.qty+1
}
const changeQty = (e) => {
  let qty = e.target.value
  if(qty < form.remaining_stock) {
    form.qty = qty
  }
  else {
    form.qty = form.remaining_stock
  }
}

const formatPrice = (price) => {
  return price+" FCFA"
}
</script>
