<template>
  <AuthentificationLayout>
    <template #title>
      <myTitle title="Se connecter" class="text-sheet-200 font-bold text-3xl sm:text-4xl lg:text-[40px] xl:text-[42px]" />
    </template>

    <template #default>
      <form class="h-2/6 flex flex-col justify-between sm:w-[400px] mt-12" @submit.prevent="login">
        <div>
          <label for="email" class="label">Email address</label>
          <input id="email" v-model="form.email" type="email" class="input" />
          <p v-if="form.errors.email" class="input-error">{{ form.errors.email }}</p>
        </div> 
        <div>
          <label for="password" class="label">Password</label>
          <div class="w-full relative">
            <input id="password" v-model="form.password" :type="showpassord ? 'text': 'password'" class="input" placeholder="" />
            <div class="absolute right-2 top-1/3 text-gray-600 text-sm dark:text-gray-400 hover:text-black dark:hover:text-white">
              <svg v-if="showpassord" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16" @click="showpassord = !showpassord">  
                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
              </svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16" @click="showpassord = !showpassord">  
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg>
            </div>
          </div>
          <p v-if="form.errors.password" class="input-error">{{ form.errors.password }}</p>
        </div> 
        <div class="mt-7">
          <Button type="submit" label="se connecter" mango rounded large />
          <!-- <button type="submit" class="rounded-lg submit-btn-style border-mango">se connecter</button> -->
        </div>
        <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
      </form>
      <div class="flex justify-between text-sm mt-2 text-gray-700 dark:text-gray-400">
        <a href="/register"> <span class="text-sheet-100 hover:text-mango">S'inscrire</span> </a>
        <a href="/reset"> Mot de passe oublié? <span class="text-sheet-100 hover:text-mango">Réinitialiser</span></a>
      </div>
    </template>
  </AuthentificationLayout>
</template>


<script setup>
import AuthentificationLayout from '@/Layouts/AuthentificationLayout.vue'
import myTitle from '@/Components/myTitle.vue'
import Button from '@/Components/button.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const form = useForm({
  email: null,
  password: null,
})

const showpassord = ref(false)

const login = () => form.post('/login')
</script>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'

export default {
  layout: BaseLayout,
}
</script>