<template>
  <div class="mb-4 border-b my-border-gray">
    <ul id="myTab" class="flex flex-wrap -mb-px text-sm font-medium text-center" data-tabs-toggle="#myTabContent" role="tablist">
      <li class="mr-2" role="presentation">
        <button id="contact-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" data-tabs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
      </li>
      <li class="mr-2" role="presentation">
        <button id="about-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">About</button>
      </li>
    </ul>
  </div>
  
  <form id="myTabContent" action="#" @submit.prevent="saveProductInformation">
    <!-- tabs 1: contact page -->
    <div id="contact" class="hidden" role="tabpanel" aria-labelledby="product-tab">
      <div class="my-4">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-600 dark:text-gray-100">Contact Page </h2>
      </div>
      <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
        <p class="text-sm text-gray-500 dark:text-gray-400">
          This is some placeholder content the 
          <span class="font-medium text-gray-800 dark:text-white">Contact tab's associated content</span>.
          Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.
        </p>
      </div>

      

      
      <div class="py-6 px-0 space-x-0 lg:p-6 lg:pb-0 lg:space-y-6 flex flex-col justify-between w-full h-auto">
        <div class="grid gap-2 sm:gap-6 sm:grid-cols-2 md:grid-cols-3">
          <div class="sm:col-span-2 md:col-span-3 flex align-bottom">
            <div class="grid gap-2 sm:gap-6 grid-cols-1 md:grid-cols-3 w-full">
              <div clas="col-span-1">
                <UpdateLogo :user="user" />
              </div>
              <div class="col-span-2 self-end">
                <label for="email" class="label">Email address</label>
                <input id="email" disabled aria-label="disabled" type="email" class="input" :placeholder="infos.email" />
                <p class="input-error">{{ formInfos.errors.email }}</p>
              </div>
            </div>
          </div>
          <div class="sm:col-span-2 md:col-span-3">
            <label for="telephone" class="label">Telephone</label>
            <div class="grid gap-2 sm:gap-6 sm:grid-cols-2 md:grid-cols-3">
              <div>
                <input id="phone" v-model="formInfos.telephone1" type="tel" class="input" :placeholder="infos.telephone1 ? infos.telephone1 : '+237 6xx xxx xxx'" />
                <p class="input-error">{{ formInfos.errors.telephone1 }}</p>
              </div>
              <div>
                <input id="phone" v-model="formInfos.telephone2" type="tel" class="input" :placeholder="infos.telephone2 ? infos.telephone2 : '+237 6xx xxx xxx'" />
                <p class="input-error">{{ formInfos.errors.telephone2 }}</p>
              </div>
              <div>
                <input id="phone" v-model="formInfos.telephone3" type="tel" class="input" :placeholder="infos.telephone3 ? infos.telephone3 : '+237 6xx xxx xxx'" />
                <p class="input-error">{{ formInfos.errors.telephone3 }}</p>
              </div>
            </div>
          </div>

          <div>
            <label for="facebook" class="label">Facebook</label>
            <input id="facebook" v-model="formInfos.facebook" type="text" class="input" :placeholder="infos.facebook" />
          </div>
          <div>
            <label for="whatsapp" class="label">whatsapp</label>
            <input id="whatsapp" v-model="formInfos.whatsapp" type="text" class="input" :placeholder="infos.whatsapp" />
          </div>
          <div>
            <label for="period" class="label">Period</label>
            <input id="period" v-model="formInfos.period" type="text" class="input" :placeholder="infos.period" />
          </div>

          <div class="sm:col-span-2 md:col-span-3">
            <label class="label">Addresses</label>
            <div class="grid gap-2 sm:gap-6 sm:grid-cols-2 md:grid-cols-3">
              <input v-model="formInfos.address1" type="text" class="input" :placeholder="infos.address1 ? infos.address1 : 'eg: Carrefour rond point express'" />
              <input v-model="formInfos.address2" type="text" class="input" :placeholder="infos.address2 ? infos.address2: 'eg: Carrefour rond point express'" />
              <input v-model="formInfos.address3" type="text" class="input" :placeholder="infos.address3 ? infos.address3 : 'eg: Carrefour rond point express'" />
            </div>
          </div>

          <!-- contact title -->
          <div class="sm:col-span-2 md:col-span-3">
            <label for="contact_title" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">contact title</label>
            <textarea v-model="formInfos.contact_title" rows="3" class="text-area" placeholder="contact page title..." />
          </div>

          <!-- contact subtitle -->
          <div class="sm:col-span-2 md:col-span-3">
            <label for="contact_subtitle" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">contact subtitle</label>
            <textarea v-model="formInfos.contact_subtitle" rows="4" class="text-area" placeholder="contact page subtitle..." />
          </div>
        </div>
      </div>
    </div>


    <!-- tabs 2: about page-->
    <div id="about" class="hidden" role="tabpanel" aria-labelledby="product-tab">
      <div class="my-4">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-600 dark:text-gray-100"> About Page </h2>
      </div>
      <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">About tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
      </div>

      <div class="py-6 px-0 space-x-0 lg:p-6 lg:space-y-6">
        <!-- about title -->
        <div class="mt-4">
          <label for="about_title" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">about title</label>
          <textarea v-model="formInfos.about_title" rows="2" class="text-area" placeholder="about page title..." />
        </div>
        <!-- about subtitle -->
        <div class="mt-4">
          <label for="about_title" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">about subtitle</label>
          <textarea v-model="formInfos.about_subtitle" rows="3" class="text-area" placeholder="about page title..." />
        </div>
        <!-- about mission -->
        <div class="mt-4">
          <label for="about_mission" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">about mission</label>
          <!-- <textarea v-model="formInfos.about_mission" rows="4" class="text-area" placeholder="about mission..." /> -->
        
          <Editor v-model="formInfos.about_mission" />
        </div>
        <!-- about choose -->
        <div class="mt-4">
          <label for="about_choose" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">about choose</label>
          <!-- <textarea v-model="formInfos.about_choose" rows="4" class="text-area" placeholder="about choose..." /> -->
          <Editor v-model="formInfos.about_choose" />
        </div>

        <!-- Modal footer -->
        <div class="mx-0 lg:mx-6 py-6 border-t my-border-gray rounded-b dark:border-gray-600">
          <Button type="submit" label="save all" rounded success base />
        </div>
      </div>
    </div>
  </form>
</template>


<script setup>
import Button from '@/Components/button.vue'
import Editor from '@/Components/editor.vue'
import UpdateLogo from '@/Components/Info/UploadLogo.vue'
import { useForm, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

defineProps({
  // user: Object,
  countries: Object,
  cities: Object,
})

const page = usePage()
const user = computed(
  () => page.props.user,
)

const infos = computed(
  () => page.props.informations,
)

const formInfos = useForm({
  logo: null,

  telephone1: null,
  telephone2: null,
  telephone3: null,

  email: null,
  address1: null,
  address2: null,
  address3: null,

  period: null,
  whatsapp: null,
  facebook: null,
  
  about_title: null,
  about_subtitle: null,
  
  about_mission: null,
  about_choose: null,
  
  contact_title: null,
  contact_subtitle: null,
  
  equipe1: null,
  equipe2: null,
  equipe3: null,
  equipe4: null,

  newsletter_title: null,
  newsletter_subtitle: null,
})


const updateInformations = () => formInfos.put('/profile')
const forminfo = useForm({
  title: '',
  content: '',
  theme_id: '',
})

</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>