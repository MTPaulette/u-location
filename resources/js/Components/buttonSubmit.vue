<template>
  <button
    type="submit"
    class="
          w-full
          text-center
          h-[40px] md:h-[35px] lg:h-[50px]
          text-sm
          font-medium
          text-white
          rounded
          bg-mango
          mb-6
          cursor-pointer
          hover:shadow-lg hover:bg-opacity-90
                    "
  >
    {{ label }}
  </button>
</template>

<script setup>

defineProps({
  label: String,
})
</script>