<template>
  <div class="flex gap-1">
    <Link 
      v-for="(link, i) in links"
      :key="i" class="px-2 py-0.5 text-xs rounded-md bg-gray-900 text-gray-50"
      :href="link.url"
      :class="{'bg-mango text-gray-900': link.active }"
      v-html="link.label"
    />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  links: Array,
})

</script>