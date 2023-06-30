<template>
  <div class="mb-4 border-b my-border-gray">
    <ul id="myTab" class="flex flex-wrap -mb-px text-sm font-medium text-center" data-tabs-toggle="#myTabContent" role="tablist">
      <li class="mr-2" role="presentation">
        <button id="product-tab" class="inline-block p-4 border-b-2 rounded-t-lg" data-tabs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">Product</button>
      </li>
      <li class="mr-2" role="presentation">
        <button id="ingredient-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" data-tabs-target="#ingredient" type="button" role="tab" aria-controls="ingredient" aria-selected="false">Ingredient</button>
      </li>
      <li class="mr-2" role="presentation">
        <button id="advantage-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" data-tabs-target="#advantage" type="button" role="tab" aria-controls="advantage" aria-selected="false">Advantage</button>
      </li>
    </ul>
  </div>
  
  <form id="myTabContent" action="#" @submit.prevent="saveProductInformation">
    <div id="product" class="hidden" role="tabpanel" aria-labelledby="product-tab">
      <div class="my-4">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-600 dark:text-gray-100"> Product informations </h2>
      </div>
      <!-- product informations -->
      <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
        <p class="text-sm text-gray-500 dark:text-gray-400">
          This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Product tab's associated content</strong>. 
          Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.
        </p>
      </div>
      <div class="relative bg-white dark:bg-gray-700">
        <!-- Modal body -->
        <div class="py-6 px-0 space-x-0 lg:p-6 lg:space-y-6">
          <div class="grid grid-cols-2 gap-6">
            <!-- name -->
            <div class="col-span-2">
              <label for="name" class="label">Product Name<span class="required">*</span></label>
              <input id="name" v-model="formproduct.name" type="text" name="name" class="input" placeholder="dried mango" />
            </div>

            <!-- category -->
            <div class="col-span-2">
              <label for="category" class="label">Category<span class="required">*</span></label>
              <select id="category" v-model="formproduct.category_id" name="weight" class="input">
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
              </select>
            </div>
            
            <!-- weight -->
            <div class="col-span-2">
              <p class="label">Differents product weights<span class="required">*</span></p>
              <div class="text-base" role="alert">
                <ul class="my-4 list-disc list-inside text-gray-500 dark:text-gray-400">
                  <li v-for="(selectedWeight, i) in formproduct.weights" :key="i" class="flex justify-between bg-green-50 border rounded-lg border-green-200 mb-2">
                    <div class="flex items-center">
                      <p class="border-gray-300 border-r-2 px-10">weight: <span class="ml-3 text-gray-900">{{ weights[selectedWeight.weight_id-1].name }}</span></p>
                      <p class="border-gray-300 border-r-2 px-10">price: <span class="ml-3 text-gray-900">{{ selectedWeight.price }} FCFA</span></p>
                      <p class="px-10">initial stock: <span class="ml-3 text-gray-900">{{ selectedWeight.initial_stock }}</span></p>
                    </div>
                    <div @click="removeWeightInitialStock(i)">
                      <button type="button" class="text-gray-900 hover:text-danger text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white">
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
                <div class="grid grid-cols-3 gap-2 md:gap-6">
                  <!-- <div class="col-span-3 sm:col-span-1"> -->
                  <div class="">
                    <label for="weight" class="label">Weight<span class="required">*</span></label>
                    <select id="weight" v-model="weightInitialStock.weight_id" name="weight" class="input">
                      <option v-for="weight in weights" :key="weight.id" :value="weight.id">{{ weight.name }}</option>
                    </select>
                  </div>

                  <!-- price -->
                  <div class="">
                    <label for="price" class="label">Price (FCFA)<span class="required">*</span></label>
                    <input id="price" v-model="weightInitialStock.price" type="number" min="0" name="price" class="input" placeholder="eg: 2500" />
                  </div>

                  <!-- initial_stock -->
                  <div class="">
                    <label for="initial_stock" class="label">Initial Stock<span class="required">*</span></label>
                    <input id="initial_stock" v-model="weightInitialStock.initial_stock" type="number" name="initial_stock" class="input" min="0" />
                  </div>
                </div>
                <div class="flex mt-2">
                  <div @click="addWeightInitialStock">
                    <div class="btn-default btn-success btn-small inline-flex items-center mb-2 capitalize font-medium text-white rounded-lg focus:ring-4 focus:outline-none">add</div>
                    <!-- <Button label="add" success small /> -->
                  </div>
                  <button type="button" class="text-gray-900 hover:text-danger text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white" @click="moreIngredient = !moreIngredient">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- description -->
            <div class="col-span-2">
              <p for="description" class="label">Product Description</p>
              <Editor v-model="formproduct.description" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- product ingredients -->
    <div id="ingredient" class="hidden" role="tabpanel" aria-labelledby="product-tab">
      <div class="my-4">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-600 dark:text-gray-100"> Product ingredients </h2>
      </div>
      <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
        <p class="text-sm text-gray-500 dark:text-gray-400">
          This is some placeholder content the 
          <span class="font-medium text-gray-800 dark:text-white">Ingredient tab's associated content</span>.
          Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.
        </p>
      </div>

      <div class="py-6 px-0 space-x-0 lg:p-6 lg:pb-0 lg:space-y-6">
        <div>
          <VueMultiselect 
            v-model="formproduct.ingredients" :options="ingredients"
            :multiple="true" :taggable="true" tag-placeholder="Add this as new tag"
            placeholder="select ingredient"
            label="name"
            track-by="id" :close-on-select="false" :clear-on-select="false" :preserve-search="true"
            @tag="addTagIngredient"
          />
        </div>
        
        <!-- preparation -->
        <div class="mt-4">
          <label for="preparation" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">Preparation</label>
          <textarea v-model="formproduct.preparation" rows="4" class="text-area" placeholder="product preparation..." />
        </div>

        <!-- utilisation -->
        <div class="mt-4 mb-6">
          <label for="utilisation" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">Utilisation</label>
          <textarea v-model="formproduct.utilisation" rows="4" class="text-area" placeholder="product utilisation..." />
        </div>
      </div>
    </div>


    <!-- product advantages -->
    <div id="advantage" class="hidden" role="tabpanel" aria-labelledby="product-tab">
      <div class="my-4">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-600 dark:text-gray-100"> Product advantages </h2>
      </div>
      <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Advantage tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
      </div>

      <div class="py-6 px-0 space-x-0 lg:p-6 lg:pb-0 lg:space-y-6">
        <!-- <div>
            v-model="formproduct.advantage.selected" :options="formproduct.advantage.options" -->
        <div>
          <VueMultiselect 
            v-model="formproduct.advantages" :options="advantages"
            :multiple="true" :taggable="true" tag-placeholder="Add this as new tag"
            placeholder="select advantage"
            label="name"
            track-by="id" :close-on-select="false" :clear-on-select="false" :preserve-search="true"
            @tag="addTagAdvantage"
          />
        </div>
        <!-- Modal footer -->
        <div class="mx-0 lg:mx-6 py-6 border-t my-border-gray rounded-b dark:border-gray-600">
          <Button type="submit" label="save all" rounded success base />
        </div>
      </div>
    </div>
  </form>
</template>

<script setup>
import VueMultiselect from 'vue-multiselect'
import Button from '@/Components/button.vue'
import Editor from '@/Components/editor.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
// import { computed } from 'vue'

defineProps({
  advantages: Object,
  ingredients: Object,
  weights: Object,
  categories: Object,
})

const formproduct = useForm({
  name: '',
  description: '',
  preparation: '',
  utilisation: '',
  category_id: '',
  weights: [],
  ingredients: [],
  advantages: [],
})

let weightInitialStock = {
  weight_id: '',
  price: 0,
  initial_stock: 0,
}

const moreIngredient = ref(false)

const saveProductInformation = () => {
  const newProduct_id = formproduct.post('/dashboard/product')
  console.log("========================================")
  console.log(newProduct_id)
}

//Weight
const addWeightInitialStock = () => {
  if(weightInitialStock.weight_id != '' && weightInitialStock.initial_stock != 0) {
    const weightItem = {
      weight_id: weightInitialStock.weight_id,
      price: weightInitialStock.price,
      initial_stock: weightInitialStock.initial_stock,
    }

    formproduct.weights.push(weightItem)

    weightInitialStock.weight_id = ''
    weightInitialStock.price = 0
    weightInitialStock.initial_stock = 0
  }
}

const removeWeightInitialStock = (id) => {
  console.log(id)
  formproduct.weights.splice(id,1)
}

const addTagIngredient = (newTag) => {
  const tag = {
    id: newTag.substring(0,2)+Math.floor((Math.random()*10000000)),
    city: newTag,
  }
  formproduct.ingredients.push(tag)
}

const addTagAdvantage = (newTag) => {
  const tag = {
    id: newTag.substring(0,2)+Math.floor((Math.random()*10000000)),
    city: newTag,
  }
  formproduct.advantages.push(tag)
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>