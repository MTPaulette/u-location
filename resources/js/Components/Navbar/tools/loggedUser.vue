<template>
  <button id="user-menu-button" type="button" class="flex mx-2 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
    <img class="w-8 h-8 rounded-full" src="./../../../../images/img.PNG" alt="user photo" />
  </button>
  <div id="user-dropdown" class="z-50 hidden my-4 text-base list-none bg-gray-50 divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <div v-if="user" class="px-4 py-3">
      <span class="block text-sm text-gray-900 dark:text-white">{{ user.firstname }}</span>
      <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ user.email }}</span>
    </div>
    <ul class="py-2" aria-labelledby="user-menu-button">
      <li v-for="(linkItem, i) in menuItems" :key="i" ref="itemsRef">
        <Link :href="linkItem[0]" class="block px-4 py-2 capitalize text-sm text-gray-700 hover:bg-sheet-100 hover:text-white dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ linkItem[1] }}</Link>
      </li>
      <li>
        <Link href="/logout" method="DELETE" as="btn" class="block px-4 py-2 text-sm text-gray-700 hover:bg-sheet-100 hover:text-white dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Deconnexion</Link>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  user: Object,
})

const menuItems = ref([['/dashboard','dashboard'], ['/settings','reglages']])
const itemsRef = ref([])

</script>