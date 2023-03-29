<template>
  <AuthentificationLayout>
    <template #title>
      <myTitle title="S inscrire" class="text-sheet-200" />
    </template>

    <template #default>
      <form class="h-2/6 flex flex-col justify-between max-w-[400px]">
        <div class="grid gap-2 sm:gap-6 grid-cols-2">
          <!-- <div class="grid sm:gap-6 grid-cols-1 sm:grid-cols-2"> -->
          <div>
            <label for="first_name" class="label-login">First name</label>
            <input id="first_name" type="text" class="input-login" placeholder="John" required />
          </div>
          <div>
            <label for="last_name" class="label-login">Last name</label>
            <input id="last_name" type="text" class="input-login" placeholder="Doe" required />
          </div>
        </div> 
        <div>
          <label for="phone" class="label-login">Phone number</label>
          <input id="phone" type="tel" class="input-login" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
        </div>
        <div class=" ">
          <label for="email" class="label-login">Email address</label>
          <input id="email" type="email" class="input-login" placeholder="john.doe@company.com" required />
        </div> 
        <div class=" ">
          <label for="password" class="label-login">Password</label>
          <input id="password" type="password" class="input-login" placeholder="•••••••••" required />
        </div> 
        <div class=" ">
          <label for="confirm_password" class="label-login">Confirm password</label>
          <input id="confirm_password" type="password" class="input-login" placeholder="•••••••••" required />
        </div> 
        <div class="flex items-start mt-4">
          <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-mango dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-mango dark:ring-offset-gray-800" required />
          </div>
          <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-mango hover:underline dark:text-mango">terms and conditions</a>.</label>
        </div>
        <div class="mt-3">
          <button type="submit" class="rounded-lg submit-btn-style border-mango">creer compte</button>
        </div>
        <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-mango font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-mango dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
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