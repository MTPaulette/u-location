<template>
  <form
    class="right-part-document my-12"
    @submit.prevent="upload"
  >
    <div class="flex justify-between items-center border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mb-12 px-4 py-5">
      <!-- <div v-if="form.images.length == 0" class="pin-document-area"> -->
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


    <div v-if="product.images.length > 0" class="relative h-3/5 w-full">
      <div class="border-2 border-mango rounded">
        <Link :href="route('product.image.destroy', {product: product.id, image: product.images[selectedImage].id})" method="DELETE" as="btn" class="absolute bg-mango text-white hover:text-red-500 top-0 right-0 p-2" @click="removeFile(i)">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
          </svg>
        </Link>
        <div class="w-full h-full">
          <img :src="product.images[selectedImage].src" />
        </div>
      </div>

      <ul class="flex flex-wrap gap-4 justify-center items-center my-12">
        <li v-for="(image, i) in product.images" :key="image.id" class="relative" @click="selectedImage=i">
          <!-- <div class="absolute bg-sheet-100 text-white hover:text-red-500 top-0 right-0 pt-1 pl-1" :class="{'bg-mango':selectedImage==i}" @click="removeFile(i)"> -->
          <Link :href="route('product.image.destroy', {product: product.id, image: image.id})" method="DELETE" as="btn" class="absolute text-white hover:text-red-500 top-0 right-0 pt-1 pl-1" :class="selectedImage==i?'bg-mango': 'bg-gray-700'" @click="removeFile(i)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 21 21">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
          </Link>
          <div class="w-14 md:w-20 h-auto border-2" :class="selectedImage==i?'border-mango': 'border-gray-700'">
            <!-- <div class="w-14 md:w-20 h-auto border-2" :class="{'border-mango':selectedImage==i}"> -->
            <img :src="image.src" />
          </div>
        </li>
      </ul>
    </div>
  </form>
</template>

<script setup>
import Button from '@/Components/button.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3'

const props = defineProps({ 
  product: Object,
})

//progress bar for images upload
router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})


const form = useForm({
  images: [],
})

const canUpload = computed(() => form.images.length)

const upload = () => {
  form.post(
    route('product.image.store', {product: props.product.id}),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}

const addFiles = (event) => {
  for(const image of event.target.files) {
    form.images.push(image)
  }
  // console.log(form.images)
}

const getImgSrc = (name) => {
  return new URL(`./../../../../public/storage/`)
}

const reset = () => form.reset('images')
</script>

<script>
export default {
  name: 'UploadImageProduct',
  
  data() {
    return {
      files: [],
      contents: [],
      selectedImage: 0,
    }
  },
  computed: {
  },
  methods: {

    uploadDocument() {
      const doc = this.$refs.document
      doc.click()
      // this.pinDocument = false
    },

    previewFiles() {
      for(let i=0; i<this.$refs.document.files.length; i++ ) {
        this.files.push(this.$refs.document.files[i])
        const reader = new FileReader()

        reader.onload = (res) => {
          this.contents.push(res.target.result)
        }
        reader.readAsDataURL(this.files[i])
      }
    },

    removeFile(i) {
      this.files.splice(i,1)
      this.contents.splice(i,1)
      console.log("================================")
      console.log(i)
    },
  },
}
</script>