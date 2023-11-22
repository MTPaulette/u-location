<template>
  <div class="flex items-center md:block">
    <div v-if="imageErrors.length" class="mb-4">
      <ImageError :errors="imageErrors" />
    </div>
  
    <div v-if="!user.image" class="flex justify-center items-center w-20 h-20 rounded-full bg-gray-200" @click="updateProfilePic">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
      </svg>
    </div>
    <div v-else class="relative w-28 max-h-28">
      <Link :href="route('userImage.destroy', {userImage: user.id})" method="DELETE" as="btn" class="absolute text-white hover:text-danger top-0 right-0 pt-1 pl-1 bg-gray-700 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 21 21">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
        </svg>
      </Link>
      <div class="w-full h-auto rounded-lg border-2 border-gray-700" @click="updateProfilePic">
        <img :src="user.src" alt="profile image" />
      </div>
    </div>
    <form
      class="mt-2"
      @submit.prevent="upload"
    >
      <div>
        <Button type="submit" label="change profile" hasicon rounded btn base :disabled="!canUpload">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16" @click="updateProfilePic">
            <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
            <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
          </svg>
        </Button>
        <input
          id="cover" ref="profilePic" type="file" 
          class="sr-only" @input="addFiles"
        />
      </div>
    </form>
  </div>
</template>

<script setup>
import Button from '@/Components/button.vue'
import ImageError from '@/Components/ImageError.vue'
import { useForm, Link, router } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import NProgress from 'nprogress'

defineProps({ 
  user: Object,
})


//progress bar for images upload
router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})


const form = useForm({
  images: null,
})

const imageErrors = computed(() => Object.values(form.errors))

const canUpload = computed(() => form.images)

const upload = () => {
  form.post(
    route('userImage.store'),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}

const addFiles = (event) => {
  form.images = event.target.files
}

const profilePic = ref(null)
const updateProfilePic = () => {
  profilePic.value.click()
}

//const reset = () => form.reset('images')
</script>