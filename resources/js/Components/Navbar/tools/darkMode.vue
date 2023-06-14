
<template>
  <label for="toggle" class="inline-flex relative items-center cursor-pointer ml-4">
    <input id="toggle" type="checkbox" class="sr-only peer" :checked="isDark" @click="toggleDark()" />
    <div 
      class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2
      peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full
      peer dark:bg-gray-700 peer-checked:after:translate-x-full 
      peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px]
       after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full 
       after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"
    />
  </label>
</template>

<script setup>
import { useToggle, useDark } from '@vueuse/core'

const isDark = useDark()
const toggleDark = useToggle(isDark)
</script>
