<template>
  <Link
    :href="route('notification.seen', {notification: notification.id})"
    method="PUT"
    class="border-0 my-border-gray border-b flex px-0.5 sm:px-4 py-3"
    :class="notification.read_at?'bg-transparent hover:bg-gray-100 dark:hover:bg-gray-700':'bg-blue-100 dark:bg-blue-900/50 hover:bg-transparent dark:hover:bg-transparent'"
  >
    <div class="w-full">
      <div class="flex">
        <div class="flex items-center justify-center max-w-[45px] w-full h-8 lg:h-11 mr-1 lg:mr-4 rounded-full bg-green-100 text-gray-900 dark:bg-green-700/50 dark:text-white">
          <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
          </svg>
        </div>

        <div>
          <h2 class="text-gray-800  dark:text-gray-400">
            Dans le but de passer, vos commamdes plus facilement, votre <a :href="'export/order/'+notification.data.order_id" class="font-semibold text-gray-900 dark:text-gray-200 hover:text-sheet-100 dark:hover:text-sheet-100">compte</a> a ete cree.
          </h2>
          <p class=" text-gray mt-1 mb-0.5 text-justify">
            Vous pouvez vous connecter en entrant votre email comme login et votre mot de paase par defaut est <span class="text-gray-900 font-semibold">nom_annee</span>. <br />
            <slot name="content" />
          </p>
          <!-- 
            Vous pouvez vous connecter en entrant votre email comme login et votre mot de paase par defaut est nom_annee. <br />
            Vous pouvez consulter depuis votre compte, la liste de votre commande et imprimer vos factures.
           -->
          <p class=" text-blue-600 dark:text-blue-500"> {{ formatDate(notification.created_at) }}</p>
        </div>
      </div>
    </div>

    <div v-if="trash" class="ml-2 hover:text-danger">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
      </svg>
    </div>
  </Link>
</template>

<script setup>
import moment from 'moment'
import { Link } from '@inertiajs/vue3'
defineProps({
  notification: Object,
  trash: {
    type: Boolean,
    default: false,
  },
})

const formatDate = (date) => {
  return moment(date).locale('fr').fromNow()
  // return moment(date).locale('fr').format('LLL')
}
</script>