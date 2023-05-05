<template>
  <button id="dropdownPannierButton" data-dropdown-toggle="dropdownPannier" class="inline-flex items-center mt-1 text-sm font-medium text-center focus:outline-none dark:hover:text-white dark:text-gray-400" type="button"> 
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
    </svg>
    <div class="relative flex">
      <span class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-2 right-3 dark:border-gray-900" />
    </div>
  </button>
  <!-- Dropdown menu -->
  <div id="dropdownPannier" class="z-20 hidden w-[300px] max-w-xs bg-white px-4 py-3 divide-y divide-gray-100 shadow-lg shadow-black dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownPannierButton">
    <!-- <div class="z-20 max-w-xs w-[300px] bg-white px-5 py-5 divide-y divide-gray-200 shadow-lg shadow-black dark:bg-gray-800 dark:divide-gray-700"> -->
    <div class="flex justify-between text-sm uppercase font-bold p-3 pb-2 text-black dark:text-gray-100">
      <p>2 items</p>
      <p class="hover:text-sheet-200"><Link href="/cart">view cart</Link></p>
    </div>
    <div class="divide-y max-h-72 over-y divide-gray-100 dark:divide-gray-700">
      <Link href="#" class="flex justify-between p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
        <div class="w-full">
          <p class="font-semibold text-gray-900 dark:text-gray-300">dried mango</p>
          <p class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">2500 FCFA</p>
          <div class="w-5 h-5 flex items-center justify-center border border-gray-400 dark:border-gray-500 bg-transparent hover:bg-black hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </div>
        </div>
        <div class="flex-shrink-0 pl-4">
          <img class="w-8 h-8" src="./../../../../images/mango1.jpg" alt="product image" />
        </div>
      </Link>
      <Link href="#" class="flex justify-between p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
        <div class="w-full">
          <p class="font-semibold text-gray-900 dark:text-gray-300">dried mango</p>
          <p class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">2500 FCFA</p>
          <div class="w-5 h-5 flex items-center justify-center border border-gray-400 dark:border-gray-500 bg-transparent hover:bg-black hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </div>
        </div>
        <div class="flex-shrink-0 pl-4">
          <img class="w-8 h-8" src="./../../../../images/mango1.jpg" alt="product image" />
        </div>
      </Link>
      <Link href="#" class="flex justify-between p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
        <div class="w-full">
          <p class="font-semibold text-gray-900 dark:text-gray-300">dried mango</p>
          <p class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">2500 FCFA</p>
          <div class="w-5 h-5 flex items-center justify-center border border-gray-400 dark:border-gray-500 bg-transparent hover:bg-black hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </div>
        </div>
        <div class="flex-shrink-0 pl-4">
          <img class="w-8 h-8" src="./../../../../images/mango1.jpg" alt="product image" />
        </div>
      </Link>
    </div>
    <div class="divide-y divide-gray-100 dark:divide-gray-700">
      <div class="flex justify-between text-sm uppercase font-bold p-3 text-black dark:text-gray-100">
        <p>total</p>
        <p class="hover:text-sheet-200">30 000 FCFA</p>
      </div>
    </div>
    <Link class="w-full flex justify-center p-3" href="/cart">
      <Button type="btn" label="checkout" success large />
    </Link>
  </div>
</template>

<script setup>
import Button from '@/Components/button.vue'
import { Link } from '@inertiajs/vue3'
</script>