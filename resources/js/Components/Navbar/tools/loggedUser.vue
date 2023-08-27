<template>
  <!-- <button id="user-menu-button" type="button" class="flex mx-2 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
    <div class="flex-shrink-0">
      <img class="w-8 h-8 rounded-full" src="./../../../../images/img.PNG" alt="user photo" />
    </div>
  </button> -->
  <button id="user-menu-button" type="button" class="flex mx-2 p-1 text-sm bg-gray-200 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
    </svg>
  </button>

  <div id="user-dropdown" class="z-50 hidden my-4 text-base list-none bg-gray-50 divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <div v-if="user" class="px-4 py-3">
      <span class="block text-sm text-gray-900 dark:text-white">{{ user.role_id }}</span>
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
import { usePage, Link } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

const page = usePage()
const user = computed(
  () => page.props.user,
)
const menuItems = ref([['/dashboard','dashboard'], ['/settings','reglages']])
const itemsRef = ref([])

</script>