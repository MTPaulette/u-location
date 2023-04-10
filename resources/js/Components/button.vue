<template>
  <!-- <button v-if="hasicon" type="button" class="inline-flex items-center capitalize text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"> -->
  <button
    v-if="hasicon" type="button"
    :class="{'btn-default':btn, 'btn-light':light, 'btn-success':success, 'btn-warning':warning, 'btn-danger':danger, 'btn-small': small, 'btn-base': base, 'btn-large': large }"
    class="inline-flex items-center mr-2 mb-2 capitalize font-medium text-white rounded-lg focus:ring-4 focus:outline-none"
  >
    <slot />
    <span class="ml-2">{{ label }}</span>
    <!-- <span class="ml-2 hidden sm:inline">{{ label }}</span> -->
  </button>

  <button v-else type="button" class="px-5 py-2.5 mr-2 mb-2 capitalize font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ label }}</button>
</template>

<script setup>
defineProps({
  label: Object,
  hasicon: {
    type: Boolean,
    default: false,
  },
  btn: {
    type: Boolean,
    default: false,
  },
  light: {
    type: Boolean,
    default: false,
  },
  success: {
    type: Boolean,
    default: false,
  },
  danger: {
    type: Boolean,
    default: false,
  },
  warning: {
    type: Boolean,
    default: false,
  },
  small: {
    type: Boolean,
    default: false,
  },
  base: {
    type: Boolean,
    default: false,
  },
  large: {
    type: Boolean,
    default: false,
  },
})
</script>