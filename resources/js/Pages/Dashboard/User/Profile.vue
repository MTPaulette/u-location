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
        <!-- <div class="flex md:block w-full px-5 py-5 h-auto md:col-span-2 lg:col-span-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"> -->
        <div class="block w-full px-5 py-5 h-auto md:col-span-2 lg:col-span-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="flex items-center md:block">
            <img class="w-28 h-28 mb-0 md:mb-4 rounded-lg" src="./../../../../images/mango15.jpg" alt="Jese image" />
            <div class="pl-3 md:pl-0">
              <div class="text-base font-semibold mb-0.5 dark:text-white">{{ user.firstname }} <span class="uppercase">{{ user.lastname }}</span></div>
              <div class="font-normal text-gray-500 mb-4">{{ user.email }}</div>
              <div @click="updateProfilePic">
                <Button label="change profile" hasicon btn base>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                    <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                  </svg>
                </Button>
                <input id="cover" ref="profilePic" type="file" name="cover" class="sr-only" />
              </div>
            </div>
          </div>
          <div v-if="user.address" class="my-4">
            <div class="font-normal text-gray-500">Address</div>
            <div class="text-base font-medium mb-0.5 dark:text-white">{{ user.address }}</div>
          </div>
          <div v-if="user.telephone">
            <div class="font-normal text-gray-500">Phone Number</div>
            <div class="text-base font-medium mb-0.5 dark:text-white">{{ user.telephone }}</div>
          </div>
        </div>

        <!-- general informations -->
        <div class="mt-4 md:mt-0 md:col-span-3 lg:col-span-2 w-full px-5 py-5 h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="mb-4">
            <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-100"> General Information </h2>
          </div>
          <form class="flex flex-col justify-between w-full h-auto">
            <div class="grid gap-2 sm:gap-6 grid-cols-2">
              <div>
                <label for="first_name" class="label-login">First name</label>
                <input id="first_name" type="text" class="input-login" :placeholder="user.firstname" required />
              </div>
              <div>
                <label for="last_name" class="label-login">Last name</label>
                <input id="last_name" type="text" class="input-login" :placeholder="user.lastname" required />
              </div>
              <div>
                <label for="phone" class="label-login">Phone number</label>
                <input id="phone" type="tel" class="input-login" :placeholder="user.telephone ? user.telephone : '123-45-678'" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
              </div>
              <div>
                <label for="email" class="label-login">Email address</label>
                <input id="email" disabled aria-label="disabled" type="email" class="input-login disabled:bg-blue-50" :placeholder="user.email" />
              </div>
              <div>
                <label for="countries" class="label-login">Country</label>
                <select id="countries" class="input-login">
                  <option selected>choose a country</option>
                  <option value="US">united states</option>
                  <option value="CM">cameroon</option>
                  <option value="CN">chinese</option>
                </select>
              </div>
              <div>
                <label for="cities" class="label-login">City</label>
                <select id="cities" class="input-login">
                  <option selected>choose a city</option>
                  <option value="US">Yaounde</option>
                  <option value="CM">Bafoussam</option>
                  <option value="CN">Garoua</option>
                </select>
              </div>
              <div>
                <label for="address" class="label-login">Address</label>
                <input id="address" type="text" class="input-login" placeholder="John" required />
              </div>
            </div>
            
            <div class="mt-3">
              <Button type="submit" label="save" btn small />
            </div>
          </form>
        </div>
      </div>

      <!-- password information -->
      <div class="my-4 md:my-5 lg:my-12 md:col-span-2 w-full px-5 py-5 h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="mb-4">
          <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-100"> Password Information </h2>
        </div>
        <form class="flex flex-col justify-between w-full h-auto">
          <div class="grid gap-2 sm:gap-6 grid-cols-2">
            <div>
              <label for="current_password" class="label-login">Current Password</label>
              <input id="current_password" type="password" class="input-login" placeholder="•••••••••" required />
            </div> 
            <div>
              <label for="new_password" class="label-login">New Password</label>
              <input id="new_password" type="password" class="input-login" placeholder="•••••••••" required />
            </div> 
            <div>
              <label for="confirm_password" class="label-login">Confirm password</label>
              <input id="confirm_password" type="password" class="input-login" placeholder="•••••••••" required />
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
            <Button type="submit" label="save" btn small>mmm</Button>
            <!-- <button type="submit" class="rounded-lg submit-btn-style border-mango">creer compte</button> -->
          </div>
          <!-- <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-mango font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-mango dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> -->
        </form>
      </div>
    </div>
  </DashboardLayout>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue'

export default {
  layout: BaseLayout,
  methods: {
    updateProfilePic() {
      const profilePic = this.$refs.profilePic
      profilePic.click()
    },
  },

}
</script>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import breadcrumb from '@/Components/PageTitle/tools/breadcrumb.vue'
import myTitle from '@/Components/myTitle.vue'
import Button from '@/Components/button.vue'

defineProps({
  user: Object,
})
</script>

