<template>
  <div v-if="flashSuccess">
    <Alert :message="flashSuccess" />
  </div>
  <slot />
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Alert from '@/Components/alert.vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
</script>