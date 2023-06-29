<template>
  <MainLayout>
    <div>
      <pageTitle title="a propos" />
    
      <!-- our mission -->
      <div class="mycontainer py-12 sm:py-20">
        <div class="flex justify-between items-center">
          <div>
            <h2>Notre mission</h2>
          </div>
          <div>
            <img src="./../../../images/illustration/why-choose-us.png" class=" w-20 h-20" alt="" />
          </div>
        </div>
        
        <!-- why choose us -->
        <div class="flex justify-around items-center w-full py-12 px-3 sm:px-12 md:px-14 bg-gray-50 dark:bg-gray-900">
          <div>
            <h2>Notre mission</h2>
          </div>
          <div>
            <img src="./../../../images/illustration/why-choose-us.png" class=" w-[300px] h-[250px]" alt="" />
          </div>
        </div>
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="text-center mx-auto mb-7 sm:mb-14 max-w-[620px]">
              <span class="font-semibold text-lg mb-2 block capitalize">notre equipe</span>
              <myTitle :title="informations.about_title" />
              <p class="text-lg sm:text-xl leading-relaxed sm:leading-relaxed">{{ informations.about_subtitle }}</p>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap justify-center gap-x-5 sm:gap-x-10">
          <div v-for="i in 4" :key="i" class="mb-7">
            <!-- <div v-for="i in 4" :key="i" class="w-1/2 md:w-1/4 self-center bg-mango"> fd5906-->
            <div class="w-[75px] h-[50px] sm:w-[150px] sm:h-[100px] border-2 border-sheet-100 relative">
              <img src="./../../../images/carousel/1.jpg" :alt="i" class="w-full h-full" />
              <span class="absolute right-0 bottom-0">
                <svg class="w-2 h-2 sm:w-5 sm:h-5" viewBox="0 0 22 22" fill="#047634" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21.5 21.5L0.505701 21.5C0.767606 10.023 10.023 0.767604 21.5 0.505697L21.5 21.5Z" stroke="#047634" />
                </svg>
              </span>
            </div>
          <!-- <teamCard /> -->
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import myTitle from '@/Components/myTitle.vue'

import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const informations = computed(
  () => page.props.informations,
)
</script>