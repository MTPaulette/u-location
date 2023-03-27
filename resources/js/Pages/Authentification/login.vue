<template>
  <div class="flex justify-center items-center absolute w-full h-full px-4 bg-gray-100">
    <div class="h-4/5 sm:h-5/6 w-full sm:w-2/3 md:w-auto">
      <form class="flex flex-col h-full justify-between bg-pink-300">
        <div class="flex justify-center p-0 m-0 bg-green-100">
          <img src="./../../../images/logo.png" class="h-[75px] sm:h-[100px] -mt-8 mb-6" alt="Agrimax Logo" />
        </div>
        <div class="grid sm:gap-6 grid-cols-1 sm:grid-cols-2">
          <!-- <div class="grid gap-6 md:grid-cols-2"> -->
          <div>
            <label for="first_name" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
            <input id="first_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
          </div>
          <div>
            <label for="last_name" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
            <input id="last_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
          </div>
        </div>
      
        <div>
          <label for="phone" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
          <input id="phone" type="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
        </div>
        <div class=" ">
          <label for="email" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
          <input id="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
        </div> 
        <div class=" ">
          <label for="password" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input id="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
        </div> 
        <div class=" ">
          <label for="confirm_password" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
          <input id="confirm_password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
        </div> 
        <div class="flex items-start mt-4">
          <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
          </div>
          <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
        </div>
        <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
    </div>
  </div>
</template>

<script setup>

</script>

<script>
import AuthentificationLayout from '@/Layouts/AuthentificationLayout.vue'
export default {
  layout: AuthentificationLayout,
}
</script>