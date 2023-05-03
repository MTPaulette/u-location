<template>
  <AuthentificationLayout>
    <template #title>
      <myTitle title="Reinitialiser le mot de passe" class="text-sheet-200" />
    </template>

    <template #default>
      <form class="h-2/6 flex flex-col justify-between sm:w-[400px] mt-12">
        <div>
          <label for="email" class="label">Adresse email</label>
          <input id="email" type="email" class="input" placeholder="john.doe@company.com" required />
        </div> 
        <div class="mt-7">
          <button type="submit" class="rounded-lg submit-btn-style border-mango">creer compte</button>
        </div>
        <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
      </form>
      <div class="flex justify-end text-xs mb-2 text-gray-700 dark:text-gray-400 -mt-2">
        Deja inscrit? &nbsp; <a href="/login" class="text-sheet-100 hover:text-mango"> Se connecter</a>
      </div>
    </template>
  </AuthentificationLayout>
</template>

<script setup>
import AuthentificationLayout from '@/Layouts/AuthentificationLayout.vue'
import myTitle from '@/Components/myTitle.vue'
</script>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'

export default {
  layout: BaseLayout,
}
</script>