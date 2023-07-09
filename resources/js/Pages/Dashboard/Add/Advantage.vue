<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center h-auto mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="advantages" />
      </div>
      <div>
        <myTitle title="Advantages" />
      </div>
    </div>
    <div class="w-full px-4 py-5 h-auto border my-border-gray rounded-lg shadow bg-white dark:bg-gray-800">
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-7 md:pl-7 md:pt-4 md:pb-8">
        <div class="col-span-2 flex flex-col items-center justify-center">
          <div class="p-3 mb-4 rounded-lg bg-gray-50 dark:bg-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
              Check to the right. If the advantage that you find not exist, you can use the left textarea to
              <span class="font-medium text-gray-800 dark:text-white">add new advantage</span>.
              You can also use the trash icon to delete some advantage.
            </p>
          </div>

          <!-- dark:bg-gray-700  -->
          <form class="relative w-full" @submit.prevent="addNew">
            <label for="advantage" class="block text-base font-medium text-gray-900 dark:text-white">Advantage</label>
            <textarea v-model="form.advantage" rows="4" class="text-area mb-4" placeholder="new advantage..." />
            <Button type="submit" label="add" rounded success large />
          </form>
        </div>
        <div class="col-span-3 my-20 md:my-0 border-none md:border-l-2 md:my-border-gray md:pl-7">
          <advantageList title="Advantages" :advantages="advantages" @delete="deleteItem" />
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import advantageList from '@/Components/List/advantage.vue'
import Button from '@/Components/button.vue'
import { useForm, router } from '@inertiajs/vue3'


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
