<template>
  <MainLayout>
    <div>
      <pageTitle title="a propos" />
    
      <!-- our mission -->
      <div class="mycontainer pb-12 sm:pb-20">
        <!-- <div class="mycontainer py-12 sm:py-20"> -->
        
        <!-- our mission -->
        <div class="block sm:flex justify-between items-center gap-6 sm:gap-20 md:gap-36 lg:gap-44 w-full pb-28">
          <div>
            <myTitle title="Notre mission" />
            <div class="flex-shrink-0 mb-4 flex sm:hidden justify-center items-center">
              <img src="./../../../images/illustration/why-choose-us.png" class="w-[200px] h-[150px] md:w-[300px] md:h-[250px]" alt="" />
            </div>
            <p class="text-lg sm:text-xl text-justify leading-relaxed">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum fuga vero neque delectus
              tempora reprehenderit velit, qui perferendis! Quisquam, illum? Sit magnam consequuntur
              quo voluptatum eaque a esse pariatur beatae. Eum fuga vero neque delectus.
            </p>
          </div>
          <div class="flex-shrink-0 hidden sm:block">
            <img src="./../../../images/illustration/why-choose-us.png" class="w-[200px] h-[150px] md:w-[300px] md:h-[250px]" alt="" />
          </div>
        </div>

        <!-- why choose us bg-gray-50 dark:bg-gray-900 -->
        <div class="block sm:flex justify-between items-center gap-6 sm:gap-20 md:gap-36 lg:gap-44 w-full pb-28">
          <div class="flex-shrink-0 hidden sm:block">
            <img src="./../../../images/illustration/why-choose-us.png" class="w-[200px] h-[150px] md:w-[300px] md:h-[250px]" alt="" />
          </div>
          <div>
            <myTitle title="Why choose us?" />
            <div class="flex-shrink-0 mb-4 flex sm:hidden justify-center items-center">
              <img src="./../../../images/illustration/why-choose-us.png" class="w-[200px] h-[150px] md:w-[300px] md:h-[250px]" alt="" />
            </div>
            <p class="text-lg sm:text-xl text-justify leading-relaxed">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum fuga vero neque delectus
              tempora reprehenderit velit, qui perferendis! Quisquam, illum? Sit magnam consequuntur
              quo voluptatum eaque a esse pariatur beatae.
            </p>
          </div>
        </div>

        <!-- our team -->
        <div>
          <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
              <div class="text-center mx-auto mb-7 sm:mb-14 max-w-[620px]">
                <span class="font-semibold text-lg mb-2 block capitalize">notre equipe</span>
                <myTitle :title="informations.about_title" class="font-bold mb-8 text-3xl sm:text-4xl lg:text-[40px] xl:text-[42px]" />
                <p class="text-lg sm:text-xl leading-relaxed">{{ informations.about_subtitle }}</p>
              </div>
            </div>
          </div>

          <div class="flex flex-wrap justify-center gap-x-5 sm:gap-x-10">
            <div v-for="i in 4" :key="i" class="mb-7">
              <!-- <div v-for="i in 4" :key="i" class="w-1/2 md:w-1/4 self-center bg-mango"> fd5906-->
              <div class="flex-shrink-0">
                <img src="./../../../images/carousel/1.jpg" :alt="i" class="w-[75px] h-[75px] sm:w-[150px] sm:h-[150px] border-2 rounded-full border-gray-500 shadow-lg shadow-black" />
              </div>
            </div>
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