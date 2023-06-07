<template>
  <!--  min-w-[218px] width="25" height="25"  -->
  <div class="flex items-center sm:items-center justify-center max-w-sm px-4 py-5 h-[110px] lg:h-[96px] bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
    <div v-if="type=='order'" class="flex items-center justify-center max-w-[45px] w-full h-8 lg:h-11 mr-2 lg:mr-4 rounded-lg bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300">
      <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </svg>
    </div>

    <div v-if="type=='income'" class="flex items-center justify-center max-w-[45px] w-full h-8 lg:h-11 mr-2 lg:mr-4 rounded-lg bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
      <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 16 16">
        <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z" />
      </svg>
    </div>

    <div v-if="type=='expense'" class="flex items-center justify-center max-w-[45px] w-full h-8 lg:h-11 mr-2 lg:mr-4 rounded-lg bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300">
      <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
      </svg>
    </div>

    <div v-if="type=='user'" class="flex items-center justify-center max-w-[45px] w-full h-8 lg:h-11 mr-2 lg:mr-4 rounded-lg bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
      <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
      </svg>
    </div>

    <div class="flex flex-col items-center justify-between h-[80px] lg:h-auto">
      <h6 class="text-sm lg:text-base leading-none lg:leading-6 mb-1 sm:mb-0 font-normal capitalize text-gray-700 dark:text-gray-400">{{ title }}</h6>
      <h3 class="text-base lg:text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ value }}</h3>
      <div class="text-xs lg:text-sm text-success sm:flex items-center justify-center h-full w-full">
        <div class="flex">
          <span>
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
            </svg>
          </span>
          <span>{{ percent }}% &nbsp;</span>
        </div>
        <p class="font-normal text-gray-500 dark:text-gray-400">(30 jours)</p>
      </div>
    </div>
    <!-- 
    <div class="flex flex-col items-center justify-between bg-sheet-100 h-[80px] lg:h-auto">
      <h6 class="text-sm lg:text-base leading-none lg:leading-6 font-normal capitalize text-gray-700 dark:text-gray-400">{{ title }}</h6>
      <h3 class="text-base lg:text-2xl leading-none lg:leading-8 font-semibold tracking-tight text-gray-900 dark:text-white">{{ value }}</h3>
      <div class="text-xs lg:text-sm text-success sm:flex items-center justify-center h-full w-full">
        <div class="flex">
          <span>
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
            </svg>
          </span>
          <span>{{ percent }}% &nbsp;</span>
        </div>
        <p class="font-normal text-gray-500 dark:text-gray-400">(30 jours)</p>
      </div>
    </div> -->
  </div>
</template>

<script setup>
defineProps({
  type: String,
  title: String,
  value: String,
  percent: String,
  state: String,
})
</script>