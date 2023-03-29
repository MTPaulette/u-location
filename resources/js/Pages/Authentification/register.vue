<template>
  <form class="h-2/6 flex flex-col justify-between">
    <div class="grid sm:gap-6 grid-cols-1 sm:grid-cols-2">
      <!-- <div class="grid gap-6 md:grid-cols-2"> -->
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
        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
      </div>
      <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
    </div>
    <div class="mt-3">
      <button type="submit" class="rounded-lg submit-btn-style border-mango">creer compte</button>
    </div>
    <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
  </form>
</template>

<script setup>
</script>

<script>
import AuthentificationLayout from '@/Layouts/AuthentificationLayout.vue'
export default {
  layout: AuthentificationLayout,
}
</script>