<template>
  <DashboardLayout>
    <div class="sm:flex sm:flex-row-reverse sm:justify-between sm:items-center mt-5 mb-3 mx-0 sm:mx-5">
      <div>
        <breadcrumb link1="dashboard" link2="new-product" />
      </div>
      <div>
        <myTitle title="New Product" />
      </div>
    </div>


    <div class="w-full h-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 sm:gap-7 md:gap-5 lg:gap-14">
        <!-- general informations -->
        <div class="md:col-span-2 w-full px-5 py-5 h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="mb-4">
            <h2 class="font-semibold text-xl md:text-2xl dark:text-gray-100"> General Information </h2>
          </div>
          <form class="flex flex-col justify-between w-full h-auto">
            <div class="grid gap-2 sm:gap-6 grid-cols-2">
              <!-- <div class="grid sm:gap-6 grid-cols-1 sm:grid-cols-2"> -->
              <div>
                <label for="first_name" class="label-login">First name</label>
                <input id="first_name" type="text" class="input-login" placeholder="user.name" required />
              </div>
              <div>
                <label for="last_name" class="label-login">Last name</label>
                <input id="last_name" type="text" class="input-login" placeholder="user.name" required />
              </div>
              <div>
                <label for="phone" class="label-login">Phone number</label>
                <input id="phone" type="tel" class="input-login" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
              </div>
              <div>
                <label for="email" class="label-login">Email address</label>
                <input id="email" disabled aria-label="disabled" type="email" class="input-login disabled:bg-blue-50" placeholder="user.email" />
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
          <h2 class="font-semibold text-xl md:text-2xl dark:text-gray-100"> Password Information </h2>
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
// import ListUser from '@/Components/User/ListUser.vue'

defineProps({
  user: Object,
})
</script>

