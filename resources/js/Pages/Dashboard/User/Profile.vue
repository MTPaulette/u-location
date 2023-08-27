<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="profile" />
      </div>
      <div>
        <myTitle title="Profile" />
      </div>
    </div>


    <div class="w-full h-auto">
      <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-3 sm:gap-7 md:gap-5 lg:gap-14">
        <!-- change profile pic -->
        <div class="block w-full px-5 py-5 h-auto md:col-span-2 lg:col-span-1 bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
          <UpdateProfileImage :user="user" />
          <div v-if="user.telephone">
            <div class="font-normal text-gray-500">Phone Number</div>
            <div class="text-base font-medium mb-0.5 dark:text-white">{{ user.telephone }}</div>
          </div>
          <div v-if="user.address" class="my-4">
            <div class="font-normal text-gray-500">Address</div>
            <div class="text-base font-medium mb-0.5 dark:text-white">{{ user.address }}</div>
            <!-- <div class="text-base font-medium mb-0.5 dark:text-white">{{ user.address }}, {{ user.city().name }}, {{ user.city().country().name }}</div> -->
          </div>
        </div>

        <!-- general informations -->
        <div class="mt-4 md:mt-0 md:col-span-3 lg:col-span-2 w-full px-5 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
          <div class="mb-4">
            <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-100"> General Information </h2>
          </div>
          <form method="PUT" class="flex flex-col justify-between w-full h-auto" @submit.prevent="updateUserInformation">
            <div class="grid gap-2 sm:gap-6 grid-cols-2">
              <div>
                <label for="first_name" class="label">First name</label>
                <input id="first_name" v-model="formUser.firstname" type="text" class="input" :placeholder="user.firstname" />
                <p class="input-error">{{ formUser.errors.firstname }}</p>
              </div>
              <div>
                <label for="last_name" class="label">Last name</label>
                <input id="last_name" v-model="formUser.lastname" type="text" class="input" :placeholder="user.lastname" />
                <p class="input-error">{{ formUser.errors.lastname }}</p>
              </div>
              <div>
                <label for="phone" class="label">Phone number</label>
                <input id="phone" v-model="formUser.telephone" type="tel" class="input" :placeholder="user.telephone ? user.telephone : '+237 6xx xxx xxx'" />
                <p class="input-error">{{ formUser.errors.telephone }}</p>
              </div>
              <div>
                <label for="email" class="label">Email address</label>
                <input id="email" disabled aria-label="disabled" type="email" class="input disabled:bg-blue-50 dark:disabled:bg-gray-900 dark:disabled:opacity-50" :placeholder="user.email" />
                <p class="input-error">{{ formUser.errors.email }}</p>
              </div>
              <div>
                <label for="country" class="label">Country</label>
                <select id="country" v-model="formUser.country_id" name="weight" class="input">
                  <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                </select>
              </div>
              <div>
                <label for="city" class="label">City</label>
                <select id="city" v-model="formUser.city_id" name="weight" class="input">
                  <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                </select>
              </div>
              <div class="col-span-2">
                <label for="address" class="label">Address</label>
                <input id="address" v-model="formUser.address" type="text" class="input" :placeholder="user.address ? user.address : 'eg: Carrefour rond point express'" />
                <p class="input-error">{{ formUser.errors.address }}</p>
              </div>
            </div>
            
            <div class="mt-3">
              <Button type="submit" label="save" rounded btn small />
            </div>
          </form>
        </div>
      </div>

      <!-- password information -->
      <div class="my-4 md:my-5 lg:my-12 md:col-span-2 w-full px-5 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
        <div class="mb-4">
          <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-100"> Password Information </h2>
        </div>
        <form method="PUT" class="flex flex-col justify-between w-full h-auto" @submit.prevent="updatePassword">
          <div class="grid gap-2 sm:gap-6 grid-cols-2">
            <div class="col-span-2">
              <label for="current_password" class="label">Current Password</label>
              <input id="current_password" v-model="formPassword.current_password" type="password" class="input" placeholder="********" required />
              <p class="input-error">{{ formPassword.errors.current_password }}</p>
            </div> 
            <div>
              <label for="new_password" class="label">New Password</label>
              <input id="new_password" v-model="formPassword.password" type="password" class="input" placeholder="" required />
            </div> 
            <div>
              <label for="confirm_password" class="label">Confirm password</label>
              <input id="confirm_password" v-model="formPassword.password_confirmation" type="password" class="input" placeholder="" required />
              <p class="input-error">{{ formPassword.errors.password }}</p>
              <!-- <p class="input-error">{{ formPassword.errors.password_confirmation }}</p> -->
            </div>
          </div>

          <!-- <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert"> -->
          <div class="my-6 text-base" role="alert">
            <span class="font-medium">Ensure that these requirements are met:</span>
            <ul class="mt-1.5 ml-4 list-disc list-inside text-gray-500 dark:text-gray-400">
              <li>At least 10 characters (and up to 100 characters)</li>
              <li>At least one lowercase character</li>
              <li>Inclusion of at least one special character, e.g., ! @ # ?</li>
            </ul>
          </div>
            
          <div>
            <Button type="submit" label="save" rounded btn small />
            <!-- <button type="submit" class="rounded-lg submit-btn-style border-mango">creer compte</button> -->
          </div>
          <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-mango font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-mango dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
        </form>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import Button from '@/Components/button.vue'
import UpdateProfileImage from '@/Components/User/UploadProfileImage.vue'
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

const formUser = useForm({
  firstname: null,
  lastname: null,
  telephone: null,
  email: null,
  country_id: null,
  city_id: null,
  address: null,
})

const formPassword = useForm({
  current_password: null,
  password: null,
  password_confirmation: null,
})

const updateUserInformation = () => formUser.put('/profile')
const updatePassword = () => formPassword.put('/password')

</script>



