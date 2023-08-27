<template>
  <NavbarDashboard />
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 sm:w-52 xl:w-64 h-screen pt-16 transition-transform -translate-x-full bg-white border-r my-border-gray sm:translate-x-0 dark:bg-gray-800" aria-label="Sidebar">
    <!-- <div id="main-sidebar" class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-black"> -->
    <div id="main-sidebar" class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium h-min-3/4 min-h-[60%]">
        <li>
          <Link
            href="/dashboard" class="sidebar-item"
            :class="{'active-sidebar-link': $page.url.startsWith('/dashboard')}"
          >
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" /><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
            </svg>
            <span class="ml-3">Dashboard</span>
          </Link>
        </li>
        <li>
          <Link href="/statistic" class="sidebar-item">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Statistic</span>
            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
          </Link>
        </li>
        <li v-if="user.role_id === 1">
          <button type="button" class="sidebar-item" aria-controls="dropdown-advantage" data-collapse-toggle="dropdown-advantage">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd" />
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Add</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="dropdown-advantage" class="hidden py-2 space-y-2">
            <li v-for="(addItem, i) in addItems" :key="i">
              <Link
                :href="addItem[0]"
                :class="{'active-sidebar-link': $page.url.startsWith(addItem[0])}"
                class="sidebar-item-dropdown"
              >
                {{ addItem[1] }}
              </Link>
            </li>
            <!-- <li>
              <Link href="/advantage" class="sidebar-item-dropdown" :class="{'active-sidebar-link': $page.url.startsWith(linkItem[0])}">Advantage</Link>
            </li>
            <li>
              <Link href="/category" class="sidebar-item-dropdown">Category</Link>
            </li>
            <li>
              <Link href="/ingredient" class="sidebar-item-dropdown">Ingredient</Link>
            </li>
            <li>
              <Link href="/theme" class="sidebar-item-dropdown">Theme</Link>
            </li> -->
          </ul>
        </li>

        <li v-if="user.role_id === 1">
          <button type="button" class="sidebar-item" aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Users</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="dropdown-user" class="hidden py-2 space-y-2">
            <li v-for="(userItem, i) in userItems" :key="i">
              <Link
                :href="userItem[0]"
                :class="{'active-sidebar-link': $page.url.startsWith(userItem[0])}"
                class="sidebar-item-dropdown"
              >
                {{ userItem[1] }}
              </Link>
            </li>
            <!-- <li>
              <Link href="/user" class="sidebar-item-dropdown">Users List</Link>
            </li>
            <li>
              <Link href="/user/create" class="sidebar-item-dropdown">New User</Link>
            </li>
            <li>
              <Link href="/profile" class="sidebar-item-dropdown">Profile</Link>
            </li> -->
          </ul>
        </li>
        
        <li v-else>
          <Link
            href="/profile" class="sidebar-item"
            :class="{'active-sidebar-link': $page.url.startsWith('/profile')}"
          >
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
            <span class="ml-3">Profile</span>
          </Link>
        </li>
        
        <li>
          <button type="button" class="sidebar-item" aria-controls="dropdown-ecommerce" data-collapse-toggle="dropdown-ecommerce">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" /></svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>E-commerce</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
          </button>
          <ul id="dropdown-ecommerce" class="hidden py-2 space-y-2">
            <li v-for="(ecommerceItem, i) in ecommerceItems" :key="i">
              <Link
                :href="ecommerceItem[0]"
                :class="{'active-sidebar-link': $page.url.startsWith(ecommerceItem[0])}"
                class="sidebar-item-dropdown"
              >
                {{ ecommerceItem[1] }}
              </Link>
            </li>
            <!-- <li>
              <Link href="/product" class="sidebar-item-dropdown">Products</Link>
            </li>
            <li>
              <Link href="/billing" class="sidebar-item-dropdown">Billing</Link>
            </li>
            <li>
              <Link href="/order" class="sidebar-item-dropdown">Order</Link>
            </li>
            <li>
              <Link href="/invoice" class="sidebar-item-dropdown">Invoice</Link>
            </li> -->
          </ul>
        </li>
        
        <li v-if="user.role_id === 1">
          <button type="button" class="sidebar-item" aria-controls="dropdown-product" data-collapse-toggle="dropdown-product">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" /></svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Products</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
          </button>
          <ul id="dropdown-product" class="hidden py-2 space-y-2">
            <li>
              <Link :href="route('dashboard.product.index')" class="sidebar-item-dropdown">Products List</Link>
            </li>
            <li>
              <Link :href="route('dashboard.product.create')" class="sidebar-item-dropdown">New Product</Link>
            </li>
          </ul>
        </li>
        
        <li v-if="user.role_id === 1">
          <button type="button" class="sidebar-item" aria-controls="dropdown-article" data-collapse-toggle="dropdown-article">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" /><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" /></svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Posts</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
          </button>
          <ul id="dropdown-article" class="hidden py-2 space-y-2">
            <li>
              <Link :href="route('dashboard.post.index')" class="sidebar-item-dropdown">Posts List</Link>
            </li>
            <!-- :href="route('product.image.destroy', {product: product.id, image: image.id})" -->
            <li>
              <Link :href="route('dashboard.post.create')" class="sidebar-item-dropdown">New post</Link>
            </li>
          </ul>
        </li>

        
        <li>
          <Link href="/logout" method="DELETE" as="btn" class="sidebar-item">
            <!-- <Link href="/logout" method="DELETE" as="btn" class="sidebar-item"> -->
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" /></svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
          </Link>
        </li>
      </ul>

      <!-- separator -->
      <ul class="pt-4 mt-4 space-y-2 font-medium border-t my-border-gray">
        <li>
          <Link href="#" class="sidebar-item">
            <svg aria-hidden="true" class="sidebar-icon" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z" />
            </svg>
            <span class="ml-4">Upgrade to Pro</span>
          </Link>
        </li>
        <li>
          <Link href="/notification" class="sidebar-item">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
            </svg>
            <span class="ml-3">Notifications</span>
            <!-- <span class="ml-3">Components</span> -->
          </Link>
        </li>
        <li>
          <Link href="/settings" class="sidebar-item">
            <svg aria-hidden="true" class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd" /></svg>
            <span class="ml-3">Settings</span>
          </Link>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import NavbarDashboard from '@/Components/Navbar/navbarDashboard.vue'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const user = computed(
  () => page.props.user,
)

const addItems = [['/advantage','Advantage'], ['/category','Category'], ['/ingredient','Ingredient'], ['/theme','Theme']]
const userItems = [['/user','Users List'], ['/user/create','New User'], ['/profile','Profile']]
const ecommerceItems = [['/product','Products'], ['/billing','Billing'], ['/order','Order'], ['/invoice','Invoice']]

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})
</script>


<style scoped>
#main-sidebar::-webkit-scrollbar{
  width: 5px;
}

#main-sidebar::-webkit-scrollbar-track{
  box-shadow: inset 0 0 6px #FFF;
}

#main-sidebar::-webkit-scrollbar-thumb{
  outline: 1px solid #C4C4C4;
  background: #C4C4C4;
  border-radius: 8px;
}
</style>