<template>
  <form
    class="my-12"
    @submit.prevent="upload"
  >
    <div v-if="imageErrors.length" class="mb-4">
      <ImageError :errors="imageErrors" />
    </div>
  
    <div class="flex justify-between items-center border-2 my-border-gray border-dashed rounded-lg mb-12 px-4 py-5">
      <input 
        type="file" multiple class="w-1/2 input-file-style"
        @input="addFiles"
      />
      <div class="flex ml-12">
        <div>
          <Button type="submit" label="upload" rounded success base :disabled="!canUpload" />
        </div>

        <div class="ml-3">
          <Button type="reset" label="reset" rounded light base @click="reset" />
        </div>
      </div>
    </div>
  </form>


  <div v-if="product.images.length" class="relative h-3/5 w-full">
    <div class="border-2 border-mango rounded h-56 overflow-hidden md:h-96">
      <!-- <Link :href="route('admin.product.image.destroy', {product: props.product.id, image: product.images[selectedImage].id})" method="DELETE" as="btn" class="absolute bg-mango text-white hover:text-danger top-0 right-0 p-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
          </svg>
        </Link> -->
      <img v-if="selectedImage < product.images.length" :src="product.images[selectedImage].src" class="w-full h-full" />
      <img v-else :src="product.images[0].src" class="w-full h-full" />
    </div>

    <ul class="flex flex-wrap gap-4 justify-center items-center my-12">
      <li v-for="(image, i) in product.images" :key="image.id" class="relative" @click="selectedImage=i">
        <Link :href="route('admin.product.image.destroy', {product: product.id, image: image.id})" method="DELETE" as="btn" class="absolute text-white hover:text-danger top-0 right-0 pt-1 pl-1" :class="selectedImage==i?'bg-mango': 'bg-gray-700'">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 21 21">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
          </svg>
        </Link>
        <div class="border-2 rounded w-16 h-14 md:w-24 md:h-20 mx-2" :class="selectedImage==i?'border-mango': 'border-gray-700'">
          <img :src="image.src" class="w-full h-full" />
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import Button from '@/Components/button.vue'
import ImageError from '@/Components/ImageError.vue'
import { useForm, Link, router } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import NProgress from 'nprogress'

const props = defineProps({ 
  product: Object,
})

const selectedImage = ref(0)

//progress bar for images upload
router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})


const form = useForm({
  images: [],
})

const imageErrors = computed(() => Object.values(form.errors))
const canUpload = computed(() => form.images.length)

const upload = () => {
  form.post(
    route('admin.product.image.store', {product: props.product.id}),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}

const addFiles = (event) => {
  for(const image of event.target.files) {
    form.images.push(image)
  }
}


const reset = () => form.reset('images')
</script>
