<template>
  <div>
    <div>
      <sectionTitle :title="title" />
    </div>
    <div class="content">
      <ol class="text-gray-900 font-medium text-base dark:text-gray-400 h-[350px] over-y pr-4">
        <li 
          v-for="theme in themes" 
          :key="theme.id"
          class="mb-2.5 pb-3 border-b my-border-gray"
        >
          <div class="flex justify-between items-center px-1">
            <span>{{ theme.name }}</span>
            <div class="ml-1 flex items-center">
              <!-- edit -->
              <span class="btn-default px-2 py-1.5 text-xs rounded-lg" @click="showUpdateForm(theme)">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
              </span>

              <!-- delete -->
              <span class="ml-1.5 btn-danger px-2 py-1 text-xs rounded-lg" @click="$emit('delete', theme.id);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
              </span>
            </div>
          </div>
          
          <div v-if="selected == theme.id">
            <form class="relative w-full" @submit.prevent="update(theme)">
              <textarea v-model="form.theme" rows="2" class="text-area mb-2" placeholder="new theme..." />
              <div class="flex gap-1">
                <Button type="submit" label="update" rounded success extrasmall :disabled="!form.theme" />
                <div @click="selected = null">
                  <Button type="cancel" label="cancel" rounded light extrasmall />
                </div>
              </div>
            </form>
          </div>
        </li>
      </ol>
    </div>
  </div>
</template>

<script setup>
import sectionTitle from '@/Components/sectionTitle.vue'
import Button from '@/Components/button.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

defineProps({
  title: String,
  themes: Object,
})

const selected = ref(null)

const form = useForm({
  theme: null,
})

const showUpdateForm = (theme) => {
  form.theme = theme.name
  selected.value = theme.id
}

const update = (theme) => {
  form.put(
    route('theme.update', {theme: theme}),
  )
  selected.value = null
}
</script>
