<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="advantages" />
      </div>
      <div>
        <myTitle title="Advantages" />
      </div>
    </div>
    <div class="w-full px-4 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
      <!-- <div class="px-4 md:px-6"> -->
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-7 md:pl-7 md:pt-4 md:pb-8">
        <div class="col-span-2 flex flex-col items-center justify-center">
          <div class="p-3 mb-4 rounded-lg bg-gray-50 dark:bg-gray-800">
            <p class="text-sm text-gray-500 dark:text-gray-400">
              Check to the right. If the advantage that you find not exist, you can use the left textarea to
              <span class="font-medium text-gray-800 dark:text-white">add new advantage</span>.
              You can also use the trash icon to delete some advantage.
            </p>
          </div>
          
          <form class="relative w-full dark:bg-gray-700" @submit.prevent="addNew">
            <label for="advantage" class="block text-sm font-medium text-gray-900 dark:text-white">Advantage</label>
            <textarea v-model="form.advantage" rows="4" class="text-area mb-4" placeholder="new advantage..." />
            <Button type="submit" label="add" rounded success large />
          </form>
        </div>
        <div class="col-span-3 border-l-2 my-border-gray md:pl-7">
          <generalList title="Advantages" :lists="advantages" @delete="deleteItem" />
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import generalList from '@/Components/generalList.vue'
import Button from '@/Components/button.vue'
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'


defineProps({
  advantages: Object,
})

const form = useForm({
  advantage: '',
})

const addNew = () => {
  form.post('/advantage')
  form.reset('advantage')
}

const deleteItem = (i) => {
  router.delete(`/advantage/${i}`)
}
</script>
