<template>
  <MainLayout>
    <pageTitle title="404" />
    <section class="bg-white py-12 sm:py-20">
      <div class="container">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class=" max-w-[850px] mx-auto text-center bg-white relative overflow-hidden py-20 px-8 sm:px-12 md:px-[60px]" data-wow-delay=".2s">
              <h2 class="font-bold mb-8 text-black text-3xl sm:text-4xl lg:text-[40px] xl:text-[42px]">
                404 - We couldn't find that page.
              </h2>
              <h3 class="font-normal mb-8 text-xl md:text-2xl text-gray-700">
                Maybe you can find what you need here?
              </h3>
              <div>
                <a href="/home">
                  <Button label="back to home" hasicon rounded success base>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                  </Button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import Button from '@/Components/button.vue'

defineProps({
  informations: Object,
})
</script>