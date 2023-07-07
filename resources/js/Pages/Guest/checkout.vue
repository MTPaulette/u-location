<template>
  <MainLayout>
    <pageTitle title="checkout" />
    <div class="mycontainer md:px-10 lg:px-14">
      <div class="w-full">
        <myTitle title="Make your checkout here" />

        <div class="mt-2 mb-4">Please register in order to checkout more quickly.</div>
        <br />
        user: {{ user }}
        <br />
        formUser: {{ formUser }}
      </div>
      <!-- <div class="grid grid-cols-1 md:grid-cols-4 gap-0 md:gap-4"> -->
      <div v-if="cartcount" class="grid grid-cols-1 md:grid-cols-4 gap-0 md:gap-4">
        <!--================================== left part ===================================-->
        <div class="col-span-3 order-2 md:order-1">
          <!-- general informations -->
          <div class="mt-4 md:mt-0 md:col-span-3 lg:col-span-2 w-full px-5 py-5 h-auto bg-white border my-border-gray rounded-lg dark:bg-gray-800">
            <div class="mb-4">
              <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-300"> General Information </h2>
            </div>
            <form method="PUT" class="flex flex-col justify-between w-full h-auto" @submit.prevent="updateUserInformation">
              <div v-if="!user" class="grid gap-2 sm:gap-6 grid-cols-2">
                <div>
                  <label for="first_name" class="label">First name</label>
                  <input id="first_name" v-model="formUser.firstname" type="text" class="input" />
                  <p class="input-error">{{ formUser.errors.firstname }}</p>
                </div>
                <div>
                  <label for="last_name" class="label">Last name</label>
                  <input id="last_name" v-model="formUser.lastname" type="text" class="input" />
                  <p class="input-error">{{ formUser.errors.lastname }}</p>
                </div>
                <div>
                  <label for="phone" class="label">Phone number</label>
                  <input id="phone" v-model="formUser.telephone" type="tel" class="input" placeholder="+237 6xx xxx xxx" />
                  <p class="input-error">{{ formUser.errors.telephone }}</p>
                </div>
                <div>
                  <label for="email" class="label">Email address</label>
                  <input id="email" type="email" class="input disabled:bg-blue-50 dark:disabled:bg-gray-900 dark:disabled:opacity-50" />
                  <p class="input-error">{{ formUser.errors.email }}</p>
                </div>
              </div>

              <!-- <div class="grid grid-cols-2 mt-2 sm:mt-6">
                <div class="col-span-2 block sm:flex justify-between items-end gap-2"> -->

              <div class="w-full block sm:flex justify-between items-end gap-2 mt-2 sm:mt-6">
                <div class="w-full">
                  <label for="country" class="label">Address</label>
                  <select id="country" v-model="formUser.country_id" name="weight" class="input">
                    <option selected disabled>selectionner une adresse de livraison</option>
                    <option>yde, terminus, cameroun</option>
                    <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                  </select>
                </div>
                <div class="mt-2 sm:mt-0" data-modal-target="customModal" data-modal-show="customModal">
                  <Button label="add new address" rounded success base :disabled="formUser.country_id" />
                </div>
              </div>
              
              <div class="w-full flex items-start mt-2 sm:mt-6">
                <div class="flex items-center h-5">
                  <input id="agree" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-mango dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-mango dark:ring-offset-gray-800" />
                </div>
                <label for="agree" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">confirmer le paiement a la livraison.</label>
              </div>
            
              <div class="mt-8 pt-8 border-t my-border-gray">
                <Button type="submit" label="save all" rounded success base />
              </div>
            </form>
          </div>

          <!-- free delivery -->
          <div class="flex p-4 mt-8 mb-28 text-sm text-green-800 border border-green-100 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Free delivery within 1-2 week (s)</span>
            </div>
          </div>
        </div>


        <!--================================== right part ===================================-->
        <div class="col-span-1 mb-10 md:mb-0 order-1 md:order-2">
          <div class="w-full px-4 py-3 border rounded-lg my-border-gray ">
            <div class="flex justify-between mb-2">
              <p>Cart subtotal</p>
              <p class="font-semibold text-sm mt-1 text-black dark:text-white">{{ formatPrice(subtotal) }}</p>
            </div>
        
            <div class="flex justify-between mb-2 items-center">
              <p>Discount</p>
              <p class="font-semibold text-sm text-black dark:text-white">30%</p>
            </div>

            <div class="flex justify-between mb-2">
              <p>Shipping charge</p>
              <p class="font-semibold text-sm text-black dark:text-white">free</p>
            </div>

            <div class="flex justify-between pb-6 border-b my-border-gray">
              <p>Cart total</p>
              <p class="font-bold px-1 bg-black text-white dark:text-white">{{ formatPrice(subtotal) }}</p>
            </div>
            <div class="mt-6">
              <Link href="/checkout">
                <Button label="checkout" success rounded small />
              </Link>
            </div>
          </div>
        </div>
      </div>
      
      <div v-else>
        <p class="mt-10 mb-20 text-xl md:text-2xl px-4">Aucun product ajoute au pannier</p>
      </div>
      
      <!-- add new address -->
      <Modal v-if="cartcount" title="Create address">
        <template #default>
          <div class="md:col-span-2 w-full px-5 py-5 h-auto">
            <!-- <div class="my-4 md:my-5 lg:my-12 md:col-span-2 w-full px-5 py-5 h-auto border my-border-gray rounded-lg shadow bg-white dark:bg-gray-800"> -->
            <div class="mb-4">
              <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-300"> Enter new address </h2>
            </div>
            <form method="PUT" class="flex flex-col justify-between w-full h-auto" @submit.prevent="updateUserInformation">
              <div class="grid gap-2 sm:gap-6 grid-cols-2">
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
                  <input id="address" v-model="formUser.address" type="text" class="input" placeholder="eg: Carrefour rond point express" />
                  <p class="input-error">{{ formUser.errors.address }}</p>
                </div>
              </div>
            
              <div class="mt-3">
                <Button type="submit" label="save" rounded success base />
              </div>
            </form>
          </div>
        </template>
      </Modal>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import CartItem from '@/Components/cartItem.vue'
import Button from '@/Components/button.vue'
import myTitle from '@/Components/myTitle.vue'
import Modal from '@/Components/modal.vue'
import { Link, usePage, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const user = computed(
  () => page.props.user,
)

const cartItems = computed(
  () => page.props.cartItems,
)

const cartcount = computed(
  () => page.props.cartcount,
)

const subtotal = computed(
  () => page.props.subtotal,
)

const formatPrice = (price) => {
  return price+" FCFA"
}

const formUser = useForm({
  firstname: user.value ? user.value.firstname : null,
  lastname: user.value ? user.value.lastname : null,
  telephone: user.value ? user.value.telephone : null,
  email: user.value ? user.value.email : null,
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
