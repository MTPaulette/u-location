<template>
  <div>
    <div>
      <sectionTitle :title="title" />
    </div>
    <div class="content">
      <ol class="text-gray-900 font-medium text-base dark:text-gray-400 h-[350px] over-y pr-4">
        <li 
          v-for="advantage in advantages" 
          :key="advantage.id"
          class="mb-2.5 pb-3 border-b my-border-gray"
        >
          <div class="flex justify-between items-center px-1">
            <span>{{ advantage.name }}</span>
            <div class="ml-1 flex items-center">
              <!-- edit -->
              <span class="btn-default px-2 py-1.5 text-xs rounded-lg" @click="editForm(advantage)">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
              </span>

              <!-- delete -->
              <!-- <span class="ml-1.5 btn-danger px-2 py-1 text-xs rounded-lg" @click="$emit('delete', advantage.id);"> -->
              <span class="ml-1.5 btn-danger px-2 py-1 text-xs rounded-lg" @click="confirmDelete(advantage.id);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
              </span>
            </div>
          </div>
          
          <!-- editForm -->
          <div v-if="edit == advantage.id">
            <form class="relative w-full" @submit.prevent="update(advantage)">
              <textarea v-model="form.advantage" rows="2" class="text-area mb-2" placeholder="new advantage..." />
              <div class="flex gap-1">
                <Button type="submit" label="update" rounded success extrasmall :disabled="!form.advantage" />
                <div @click="edit = null">
                  <Button type="cancel" label="cancel" rounded light extrasmall />
                </div>
              </div>
            </form>
          </div>
          
          <!-- confirmDelete -->
          <div v-if="confirm == advantage.id" class="w-full flex p-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
            <span class="sr-only">Danger</span>
            <div>
              <span class="font-medium">Are you sure that you want to delete this item?</span>
              <div class="flex gap-2 mt-1.5">
                <div @click="$emit('delete', advantage.id);">
                  <Button label="confirm" rounded danger extrasmall />
                </div>
                <div @click="confirm = null">
                  <Button type="cancel" label="cancel" rounded light extrasmall />
                </div>
              </div>
            </div>
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
  advantages: Object,
})

const edit = ref(null)
const confirm = ref(null)

const form = useForm({
  advantage: null,
})

const editForm = (advantage) => {
  form.advantage = advantage.name
  confirm.value = null
  edit.value = advantage.id
}

const update = (advantage) => {
  form.put(
    route('advantage.update', {advantage: advantage}),
  )
  edit.value = null
}

const confirmDelete = (advantage_id) => {
  edit.value = null
  confirm.value = advantage_id
}
</script>
