<template>
  <AuthentificationLayout>
    <template #title>
      <myTitle title="Se connecter" class="text-sheet-200" />
    </template>

    <template #default>
      <form class="h-2/6 flex flex-col justify-between sm:w-[400px] mt-12" @submit.prevent="login">
        <div>
          <label for="email" class="label-login">Email address</label>
          <input id="email" v-model="form.email" type="email" class="input-login" placeholder="john.doe@company.com" />
          <p v-if="form.errors.email" class="input-error">{{ form.errors.email }}</p>
        </div> 
        <div>
          <label for="password" class="label-login">Password</label>
          <input id="password" v-model="form.password" type="password" class="input-login" placeholder="" />
          <p v-if="form.errors.password" class="input-error">{{ form.errors.password }}</p>
        </div> 
        <div class="mt-7">
          <button type="submit" class="rounded-lg submit-btn-style border-mango">creer compte</button>
        </div>
        <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
      </form>
      <div class="flex justify-between text-xs mb-2 text-gray-700 dark:text-gray-400">
        <a href="/register"> <span class="text-sheet-100 hover:text-mango">S'enregistrer</span> </a>
        <a href="/reset"> Mot de passe oublié? <span class="text-sheet-100 hover:text-mango">Réinitialiser</span></a>
      </div>
    </template>
  </AuthentificationLayout>
</template>


<script setup>
import AuthentificationLayout from '@/Layouts/AuthentificationLayout.vue'
import myTitle from '@/Components/myTitle.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  email: null,
  password: null,
})

const login = () => form.post('/login')
</script>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'

export default {
  layout: BaseLayout,
}
</script>