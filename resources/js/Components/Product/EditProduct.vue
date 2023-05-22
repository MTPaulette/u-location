<template>
  <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
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
  
  <div id="myTabContent">
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
      <form action="#" class="relative bg-white dark:bg-gray-700" @submit.prevent="saveProductInformation">
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
                      <p class="border-gray-300 border-r-2 px-10">weight: <span class="ml-3 text-gray-900">{{ weights[selectedWeight.weight_id].name }}</span></p>
                      <p class="border-gray-300 border-r-2 px-10">price: <span class="ml-3 text-gray-900">{{ selectedWeight.price }} FCFA</span></p>
                      <p class="px-10">initial stock: <span class="ml-3 text-gray-900">{{ selectedWeight.initial_stock }}</span></p>
                    </div>
                    <div @click="removeWeightInitialStock(i)">
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
                  <button type="button" class="text-gray-900 hover:text-red-600 text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white" @click="moreIngredient = !moreIngredient">
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
              <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                  <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                    <div class="flex items-center space-x-1 sm:pr-4">
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Attach file</span>
                      </button>
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Embed map</span>
                      </button>
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Upload image</span>
                      </button>
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Format code</span>
                      </button>
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Add emoji</span>
                      </button>
                    </div>
                    <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Add list</span>
                      </button>
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" /></svg>       
                        <span class="sr-only">Settings</span>
                      </button>
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Timeline</span>
                      </button>
                      <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Download</span>
                      </button>
                    </div>
                  </div>
                  <button type="button" data-tooltip-target="tooltip-fullscreen" class="p-2 text-gray-500 rounded cursor-pointer sm:ml-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                    <span class="sr-only">Full screen</span>
                  </button>
                  <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Show full screen
                    <div class="tooltip-arrow" data-popper-arrow />
                  </div>
                </div>
                <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                  <label for="description" class="sr-only">Publish post</label>
                  <textarea id="description" v-model="formproduct.description" rows="8" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..." />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="mx-0 lg:mx-6 py-6 border-t border-gray-200 rounded-b dark:border-gray-600">
          <Button type="submit" label="save all" rounded success base />
        </div>
      </form>
    </div>

    <!-- product ingredients -->
    <div id="ingredient" class="hidden" role="tabpanel" aria-labelledby="product-tab">
      <div class="my-4">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-600 dark:text-gray-100"> Product ingredients </h2>
      </div>
      <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
        <p class="text-sm text-gray-500 dark:text-gray-400">
          This is some placeholder content the 
          <strong class="font-medium text-gray-800 dark:text-white">Ingredient tab's associated content</strong>.
          Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.
        </p>
      </div>

      <div class="py-6 px-0 space-x-0 lg:p-6 lg:pb-0 lg:space-y-6">
        <div>
          <VueMultiselect 
            v-model="ingredient.selected" :options="ingredient.options"
            :multiple="true" :taggable="true" tag-placeholder="Add this as new tag"
            placeholder="select ingredient"
            label="name"
            track-by="id" :close-on-select="false" :clear-on-select="false" :preserve-search="true"
            @tag="addTagIngredient"
          />
        </div>
        <!--br />ipsum <pre class="langage-json"><code> {{ selected }}</code></pre> <br /-->

        <div v-if="!moreIngredient" class="mt-4" @click="moreIngredient = !moreIngredient">
          <Button label="More ingredients" hasicon rounded light class="w-full py-2.5 text-sm flex justify-center" />
        </div>

        <form class="relative bg-white dark:bg-gray-700" @submit.prevent="addNewIngredient">
          <div v-if="moreIngredient">
            <p class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">More ingredients</p>
            <div class="text-base" role="alert">
              <ul class="mt-1.5 list-disc list-inside text-gray-500 dark:text-gray-400">
                <li v-for="(ingredient, i) in newIngredients" :key="i" class="flex justify-between pl-3 bg-green-50 border rounded-lg border-green-200">
                  <div>{{ ingredient }}</div>
                  <div @click="removeIngredient(i)">
                    <button type="button" class="text-gray-900 hover:text-red-600 text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                      </svg>
                    </button>
                  </div>
                </li>
              </ul>
            </div>
            <div class="w-full mt-4 mb-2">
              <label for="ingredient" class="sr-only">ingredient</label>
              <input id="ingredient" v-model="newIngredient" type="text" name="ingredient" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." />
            </div>
            <div class="flex">
              <div>
                <Button type="submit" label="add" success small />
              </div>
              <button type="button" class="text-gray-900 hover:text-red-600 text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white" @click="moreIngredient = !moreIngredient">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg>
              </button>
            </div>
          </div>

          <!-- preparation -->
          <div class="mt-4">
            <label for="preparation" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">Preparation</label>
            <textarea v-model="preparation" rows="4" class="text-area" placeholder="product preparation..." />
          </div>

          <!-- utilisation -->
          <div class="mt-4 mb-6">
            <label for="utilisation" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">Utilisation</label>
            <textarea v-model="utilisation" rows="4" class="text-area" placeholder="product utilisation..." />
          </div>

          <div class="flex items-center py-6 border-t border-gray-200 rounded-b dark:border-gray-600">
            <div>
              <Button type="submit" label="save all" rounded success base />
            </div>
          </div>
        </form>
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
        <div>
          <VueMultiselect 
            v-model="advantage.selected" :options="advantage.options"
            :multiple="true" :taggable="true" tag-placeholder="Add this as new tag"
            placeholder="select advantage"
            label="name"
            track-by="id" :close-on-select="false" :clear-on-select="false" :preserve-search="true"
            @tag="addTagAdvantage"
          />
        </div>
        <!--br />ipsum <pre class="langage-json"><code> {{ selected }}</code></pre> <br /-->

        <div v-if="!moreAdvantage" class="mt-4" @click="moreAdvantage = !moreAdvantage">
          <Button label="More advantages" hasicon rounded light class="w-full py-2.5 text-sm flex justify-center" />
        </div>

      
        <form v-else class="relative bg-white dark:bg-gray-700" @submit.prevent="addNewAdvantage">
          <p class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">More advantages</p>
          <div class="text-base" role="alert">
            <ul class="mt-1.5 list-disc list-inside text-gray-500 dark:text-gray-400">
              <li v-for="(advantage, i) in newAdvantages" :key="i" class="flex justify-between pl-3 bg-green-50 border rounded-lg border-green-200">
                <div>{{ advantage }}</div>
                <div @click="removeAdvantage(i)">
                  <button type="button" class="text-gray-900 hover:text-red-600 text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                  </button>
                </div>
              </li>
            </ul>
          </div>
          <div class="w-full mt-4 mb-2">
            <label for="advantage" class="sr-only">advantage</label>
            <input id="advantage" v-model="newAdvantage" type="text" name="advantage" class="input" placeholder="..." />
          </div>
          <div class="flex">
            <div>
              <Button type="submit" label="add" success small />
            </div>
            <button type="button" class="text-gray-900 hover:text-red-600 text-sm px-3 -mt-2 py-2.5 dark:text-gray-400 dark:hover:text-white" @click="moreAdvantage = !moreAdvantage">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
              </svg>
            </button>
          </div>




          <div class="flex items-center py-6 border-t border-gray-200 rounded-b dark:border-gray-600">
            <div>
              <Button type="submit" label="save all" rounded success base />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import Button from '@/Components/button.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const formproduct = useForm({
  name: '',
  description: '',
  category_id: '',
  weights: [],
})

let weightInitialStock = {
  weight_id: '',
  price: 0,
  initial_stock: 0,
}

const moreIngredient = ref(false)
const newIngredient = ref('')
const preparation = ref('')
const utilisation = ref('')
const newIngredients = ref([])

const moreAdvantage = ref(false)
const newAdvantage = ref('')
const newAdvantages = ref([])

const saveProductInformation = () => {
  const newProduct_id = formproduct.post('/dasboard/product')
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

//Ingredient
const addNewIngredient = () => {
  if(newIngredient.value != '') {
    newIngredients.value.push(newIngredient.value)
    newIngredient.value = ''
  }
}

const removeIngredient = (id) => {
  console.log(id)
  newIngredients.value.splice(id,1)
}
//advantage
const addNewAdvantage = () => {
  if(newAdvantage.value != '') {
    newAdvantages.value.push(newAdvantage.value)
    newAdvantage.value = ''
  }
}

const removeAdvantage = (id) => {
  console.log(id)
  newAdvantages.value.splice(id,1)
}
</script>

<script>
import VueMultiselect from 'vue-multiselect'
export default{
  components: { VueMultiselect },
  props: {
    advantages: Object,
    ingredients: Object,
    weights: Object,
    categories: Object,
  },

  data () {
    return {
      ingredient: {
        selected: [],
        options: this.ingredients,
      },
      advantage: {
        selected: [],
        options: this.advantages,
      },
    }
  },

  methods: {
    addTagIngredient(newTag) {
      const tag = {
        id: newTag.substring(0,2)+Math.floor((Math.random()*10000000)),
        city: newTag,
      }
      this.ingredient.options.push(tag)
      this.ingredient.selected.push(tag)
    },
    addTagAdvantage(newTag) {
      const tag = {
        id: newTag.substring(0,2)+Math.floor((Math.random()*10000000)),
        city: newTag,
      }
      this.advantage.options.push(tag)
      this.advantage.selected.push(tag)
    },
  },
}
</script>
<!-- <style src="@vueform/multiselect/themes/tailwind.css"></style> -->
<style src="vue-multiselect/dist/vue-multiselect.css"></style>