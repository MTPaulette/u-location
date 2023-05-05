<template>
  <form
    class="right-part-document my-12"
    @submit.prevent="upload"
  >
    <div class="pin-document-area">
      <!-- <div v-if="form.images.length == 0" class="pin-document-area"> -->
      <input 
        type="file" multiple class="input-file-style"
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



    <!-- <div v-else class="selected-images-part">
      <div class="selected-image">
        <div class="trash-icon" @click="removeFile(i)">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
          </svg>
        </div>
      </div>

      <ul class="selected-images">
        <li v-for="(src, i) in form.images" :key="i" :class="selectedImage==i?'border-orange': ''" @click="selectedImage=i">
          <div class="trash-icon" @click="removeFile(i)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
          </div>
          <img :src="src" width="100%" height="100%" />
        </li>
        <li class="add-image" @click="uploadDocument()">
          <input id="images" ref="document" type="file" name="images" class="sr-only" multiple @change="previewFiles" />
          <span>+</span>
        </li>
      </ul>
    
      <div class="flex">
        <div>
          <Button type="submit" label="upload" rounded success base />
        </div>

        <div class="ml-4">
          <Button type="reset" label="reset" rounded light base @click="reset" />
        </div>
      </div>
    </div> -->
  </form>

  <form
    enctype="multipart/form-data"
    :action="route('product.image.store', {product: product.id})" 
    method="POST" class="right-part-document"
  >
    <div v-if="files.length == 0" class="pin-document-area">
      <input id="images" ref="document" type="file" name="images" class="sr-only" multiple @change="previewFiles" />
      <p @click="uploadDocument()">click for show the images repository </p>
    </div>

    <div v-else class="selected-images-part">
      <div class="selected-image">
        <div class="trash-icon" @click="removeFile(i)">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
          </svg>
        </div>
        <img :src="contents[selectedImage]?contents[selectedImage]:contents[0]" width="100%" height="100%" />
      </div>

      <ul class="selected-images">
        <li v-for="(src, i) in contents" :key="i" :class="selectedImage==i?'border-orange': ''" @click="selectedImage=i">
          <div class="trash-icon" @click="removeFile(i)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
          </div>
          <img :src="src" width="100%" height="100%" />
        </li>
        <li class="add-image" @click="uploadDocument()">
          <input id="images" ref="document" type="file" name="images" class="sr-only" multiple @change="previewFiles" />
          <span>+</span>
        </li>
      </ul>
    
      <div class="mx-0 lg:mx-6 py-6 border-t border-gray-200 rounded-b dark:border-gray-600">
        <Button type="submit" label="save all" rounded success base />
      </div>
    </div>
  </form>
</template>

<script setup>
import Button from '@/Components/button.vue'
import { useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({ product: Object })
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

<style scoped>
/****************************** right-part-document ************************/
.right-part-document {
  position: relative;
  width: 100%;
  height: calc(100vh - 158px);
}

.pin-document-area {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;

  width: 100%;
  height: 100%;
  background: #FFFFFF;
  border: 2px dashed #C4C4C4;
}


/****************************** selected images  ************************/

.selected-images-part {
  position: relative;
  height: 100%;
  width: 100%;
}

.selected-image {
  height: 60%;
  border: 2px solid #C4C4C4;
}

.selected-images {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 49px;
  margin-bottom: 49px;
}

.selected-images li {
  width: 113px;
  height: 65px;
  margin-left: 8px;
  margin-right: 8px;
  background: #FFFFFF;
  border: 2px solid #C4C4C4;
}

.border-orange {
  border-color: #F7990E !important;
}

.trash-icon {
  position: absolute;
  background: #000;
  top: 0;
  right: 0;
  padding-left: 5px;
  padding-right: 5px;
}

.selected-images .add-image {
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Prompt';
  font-style: normal;
  font-weight: 400;
  font-size: 48px;
  line-height: 73px;
  color: #C4C4C4;  
}

</style>