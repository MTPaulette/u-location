<template>
  <MainLayout>
    <pageTitle title="checkout" />
    <div class="mycontainer md:px-10 lg:px-14">
      <div class="w-full">
        <myTitle title="Make your checkout here" />

        <div class="mt-2 mb-4">Please register in order to checkout more quickly.</div>
        <br />
        <br />
        form: {{ form }}
        <br /><br />
      </div>
      <!-- <div class="grid grid-cols-1 md:grid-cols-4 gap-0 md:gap-4"> -->
      <div v-if="cartcount" class="grid grid-cols-1 md:grid-cols-4 gap-0 md:gap-4">
        <!--================================== left part ===================================-->
        <div class="col-span-3 order-2 md:order-1">
          <!-- general informations -->
          <div class="mt-4 md:mt-0 md:col-span-3 lg:col-span-2 w-full px-5 py-4 h-auto bg-white border my-border-gray rounded-lg dark:bg-gray-800">
            <form method="POST" @submit.prevent="order">
              <div v-if="!form.new_address">
                <div class="mb-4">
                  <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-200"> General Information </h2>
                </div>
                <div class="flex flex-col justify-between w-full h-auto">
                  <div v-if="!user" class="grid gap-2 sm:gap-6 grid-cols-2">
                    <div>
                      <label for="first_name" class="label">First name</label>
                      <input id="first_name" v-model="form.firstname" type="text" class="input" />
                      <p class="input-error">{{ form.errors.firstname }}</p>
                    </div>
                    <div>
                      <label for="last_name" class="label">Last name</label>
                      <input id="last_name" v-model="form.lastname" type="text" class="input" />
                      <p class="input-error">{{ form.errors.lastname }}</p>
                    </div>
                    <div>
                      <label for="phone" class="label">Phone number</label>
                      <input id="phone" v-model="form.telephone" type="tel" class="input" placeholder="+237 6xx xxx xxx" />
                      <p class="input-error">{{ form.errors.telephone }}</p>
                    </div>
                    <div>
                      <label for="email" class="label">Email address</label>
                      <input id="email" v-model="form.email" type="email" class="input disabled:bg-blue-50 dark:disabled:bg-gray-900 dark:disabled:opacity-50" />
                      <p class="input-error">{{ form.errors.email }}</p>
                    </div>
                  </div>

                  <div class="w-full block sm:flex justify-between items-end gap-2 mt-2 sm:mt-6">
                    <div class="w-full">
                      <label for="address" class="label">Address</label>
                      <select id="address" v-model="form.address_id" name="weight" class="input">
                        <option selected disabled>selectionner une adresse de livraison</option>
                        <optgroup v-for="addressGroup in addresses" :key="addressGroup" :value="addressGroup">
                          <option v-for="address in addressGroup" :key="address.id" :value="address.id">{{ address.city.name }}, {{ address.street }}</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="mt-2 sm:mt-0" @click="showAddressFrom">
                      <!-- <div class="mt-2 sm:mt-0" data-modal-target="customModal" data-modal-show="customModal"> -->
                      <Button label="add new address" rounded success base :disabled="form.country_id" />
                    </div>
                  </div>
                </div>
              </div>
              


              <!-- new address -->
              <div v-else>
                <div class="mb-4">
                  <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-200"> Enter new address </h2>
                </div>
                <div class="flex flex-col justify-between w-full h-auto">
                  <div class="grid gap-2 sm:gap-6 grid-cols-2">
                    <div>
                      <label for="country" class="label">Country</label>
                      <select id="country" v-model="form.country_id" name="weight" class="input">
                        <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}-{{ country.id }}</option>
                      </select>
                    </div>
                    <div>
                      <label for="city" class="label">City</label>
                      <select id="city" v-model="form.city_id" name="weight" class="input" :disabled="!form.country_id">
                        <optgroup v-for="cityGroup in cities" :key="cityGroup" :value="cityGroup">
                          <option v-for="city in cityGroup" :key="city.id" :value="city.id">{{ city.name }}-{{ city.id }}</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-span-2">
                      <label for="address" class="label">Address</label>
                      <input id="address" v-model="form.street" type="text" class="input" placeholder="eg: Carrefour rond point express" :disabled="!form.city_id" />
                      <p class="input-error">{{ form.errors.street }}</p>
                    </div>
                  </div>
                </div>
              </div>


              <!-- paiement when delivery -->
              <div class="w-full flex items-start mt-2 sm:mt-6">
                <div class="flex items-center h-5">
                  <input id="paiement" v-model="form.paiement_mode" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-mango dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-mango dark:ring-offset-gray-800" />
                </div>
                <label for="paiement" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-200">confirmer le paiement a la livraison.</label>
              </div>
            
              <div class="mt-8 pt-8 border-t my-border-gray">
                <Button type="submit" label="valid order" rounded success base :disabled="!form.paiement_mode" />
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
                <Button label="valid order" success rounded small />
              </Link>
            </div>
          </div>
        </div>
      </div>
      
      <div v-else>
        <p class="mt-10 mb-20 text-xl md:text-2xl px-4">Aucun product ajoute au pannier</p>
      </div>
      
      <!-- add new address -->
      <!-- <Modal v-if="cartcount" title="Create address">
        <template #default>
      <div class="md:col-span-2 w-full px-5 py-5 h-auto">
        <div class="mb-4">
          <h2 class="font-semibold text-xl md:text-2xl text-gray-700 dark:text-gray-300"> Enter new address </h2>
        </div>
        <form method="PUT" class="flex flex-col justify-between w-full h-auto" @submit.prevent="updateUserInformation">
          <div class="grid gap-2 sm:gap-6 grid-cols-2">
            <div>
              <label for="country" class="label">Country</label>
              <select id="country" v-model="form.country_id" name="weight" class="input">
                <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
              </select>
            </div>
            <div>
              <label for="city" class="label">City</label>
              <select id="city" v-model="form.city_id" name="weight" class="input">
                <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
              </select>
            </div>
            <div class="col-span-2">
              <label for="address" class="label">Address</label>
              <input id="address" v-model="form.address" type="text" class="input" placeholder="eg: Carrefour rond point express" />
              <p class="input-error">{{ form.errors.address }}</p>
            </div>
          </div>
            
          <div class="mt-3">
            <Button type="submit" label="save" rounded success base />
          </div>
        </form>
      </div>
      </template>
      </Modal> -->
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import pageTitle from '@/Components/PageTitle/pageTitle.vue'
import Button from '@/Components/button.vue'
import myTitle from '@/Components/myTitle.vue'
// import Modal from '@/Components/modal.vue'
import { Link, usePage, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'


defineProps({
  countries: Object,
  cities: Object,
  addresses: Object,
})

const page = usePage()
const user = computed(
  () => page.props.user,
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

const form = useForm({
  firstname: user.value ? user.value.firstname : null,
  lastname: user.value ? user.value.lastname : null,
  telephone: user.value ? user.value.telephone : null,
  email: user.value ? user.value.email : null,
  country_id: null,
  city_id: null,
  address_id: null,
  street: null,
  paiement_mode: false,
  new_address: false,
})


const showAddressFrom = () => {
  console.log("============================================")
  console.log(cartcount.value)
  if(cartcount.value) {
    form.new_address = true
    form.address_id = null
  }
}

const order = () => form.post(route('order.store'))
</script>
