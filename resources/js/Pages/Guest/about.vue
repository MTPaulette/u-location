<template>
  <MainLayout>
    <div>
      <pageTitle title="a propos" />
    
      <div class="mycontainer py-12 sm:py-20">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="text-center mx-auto mb-[60px] max-w-[620px]">
              <span class="font-semibold text-lg text-primary mb-2 block capitalize">
                notre equipe
              </span>
              <myTitle :title="informations.about_title" />
              <p class="text-lg sm:text-xl leading-relaxed sm:leading-relaxed">{{ informations.about_subtitle }}</p>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap justify-around">
          <div v-for="i in 4" :key="i" class="mb-7">
            <!-- <div v-for="i in 4" :key="i" class="w-1/2 md:w-1/4 self-center bg-mango"> fd5906-->
            <div class="w-[150px] h-[100px] border-2 border-sheet-100 relative">
              <img
                src="./../../../images/carousel/1.jpg"
                :alt="i"
                class="w-full h-full"
              />
              <span class="absolute right-0 bottom-0">
                <svg
                  width="22"
                  height="22"
                  viewBox="0 0 22 22"
                  fill="#047634"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M21.5 21.5L0.505701 21.5C0.767606 10.023 10.023 0.767604 21.5 0.505697L21.5 21.5Z"
                    stroke="#047634"
                  />
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