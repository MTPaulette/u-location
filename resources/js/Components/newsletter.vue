<template>
  <div class="bg-gray-100 relative overflow-hidden text-center py-16 px-6 sm:px-12 md:px-28">
    <MyTitle title="Rejoindre notre newsletter!" />
    <!-- <h3 class="font-semibold text-gray-900 mb-2 text-2xl">Rejoindre notre newsletter!</h3> -->
    <p class="text-base text-gray-900 mt-3 mb-8">
      Voulez-vous etre averti lorsqu'il y'a du nouveau sur Agrimax? Inscrivez vous à la Newsletter et vous
      serez parmi les premiers à découvrir les nouveaux produits, les nouvelles articles et les informations complémentaires.
    </p>
    <form action="" class="flex justify-center mb-2">
      <div class="relative w-full max-w-[575px]">
        <label for="email" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
            <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
            </svg>
          </div>
          <input id="email" type="email" class="py-4 pl-12 input-search" placeholder="Entrer votre email" required />
          <button type="submit" class="absolute top-0 right-0 px-5 sm:px-7 py-4 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">S'inscrire</button>
        </div>
      </div>
    </form>
    <p class="text-sm font-medium text-gray-700">
      En vous abonnant, vous acceptez les <a href="/terms" class="text-mango hover:underline dark:text-mango">terms and conditions</a> et <a href="/privacy" class="text-mango hover:underline dark:text-mango">privacy policy</a>
      <!-- En vous abonnant, vous acceptez les <a href="/terms" class="text-mango hover:underline dark:text-mango">terms and conditions</a> and <a href="/privacy" class="text-mango hover:underline dark:text-mango">privacy policy</a> -->
    </p>
    <p class="text-sm font-medium text-gray-900">Ne vous inquiétez pas, nous ne spammons pas</p>
  </div>
</template>

<script setup>
import MyTitle from './myTitle.vue'

</script>