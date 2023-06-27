<template>
  <div class="w-full">
    <h2 class="font-bold text-gray-900 dark:text-gray-200 pb-0 relative capitalize">{{ title }}</h2>
    <span
      class="h-[4px] w-12 mb-2 inline-block"
      :class="{'bg-onion-200':purple, 'bg-sheet-50':green, 'bg-orange-400':orange, 'bg-pineapple':yellow}"
    />
  </div>
</template>

<script setup>
defineProps({
  title: String,
  purple: {
    type: Boolean,
    default: true,
  },
  green: {
    type: Boolean,
    default: false,
  },
  yellow: {
    type: Boolean,
    default: false,
  },
  orange: {
    type: Boolean,
    default: false,
  },
})
</script>