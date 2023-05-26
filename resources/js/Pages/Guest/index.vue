<template>
  <IndexLayout :informations="informations" :categories="categories">
    <div class="mx-3 sm:ml-56 h-auto sm:min-h-[400px]">
      <div class="flex">
        <div>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat,
          culpa! Corporis vel totam suscipit quidem obcaecati recusandae eligendi dignissimos
          inventore molestiae quam error eum adipisci magnam, dicta repellendus eos molestias?
        </div>
        <div>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat,
          culpa! Corporis vel totam suscipit quidem obcaecati recusandae eligendi dignissimos
          inventore molestiae quam error eum adipisci magnam, dicta repellendus eos molestias?
        </div>
      </div>
    </div>
    <div />
    <!-- <Streamer /> -->
  </IndexLayout>
</template>

<script setup>
import IndexLayout from '@/Layouts/IndexLayout.vue'
// import Streamer from '@/Components/streamer.vue'

defineProps({
  informations: Object,
  categories: Object,
})
</script>