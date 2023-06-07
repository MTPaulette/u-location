<template>
  <nav class="px-2 sm:px-4 py-1 bg-purple-50 text-gray-700 dark:text-gray-400 text-sm font-light border-b border-purple-200 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-center md:justify-between mx-auto w-full">
      <div class="flex">
        <div class="flex items-center border-r-2 border-purple-100 pr-6 mr-6">
          <span class="mr-2 text-sheet-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
            </svg>
          </span>
          <div class="text-xs">
            <p v-if="informations.whatsapp">{{ informations.whatsapp }}</p>
            <p v-if="informations.telephone1">{{ informations.telephone1 }}</p>
          </div>
        </div>
        <div class="flex items-center px-2">
          <span class="mr-2 text-sheet-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
            </svg>
          </span>
          <span v-if="informations.email">{{ informations.email }}</span>
        </div>
      </div>
      
      <div class="flex">
        <div class="flex items-center border-r-2 border-purple-100 pr-6 mr-6">
          <span class="mr-2 text-sheet-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
              <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
          </span>
          <span v-if="informations.address1">{{ informations.address1 }}</span>
        </div>
        <div class="flex items-center border-r-2 border-purple-100 pr-6 mr-6">
          <span class="mr-2 text-sheet-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
            </svg>
          </span>
          <span v-if="informations.period">{{ informations.period }}</span>
        </div>
        <div class="flex items-center px-2">
          <span class="mr-2 text-sheet-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M7.5 1v7h1V1h-1z" />
              <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
            </svg>
          </span>
          <span>Login</span>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
defineProps({
  informations: Object,
})
</script>
