<template>
  <div>
    <div class="block sm:flex sm:justify-between sm:items-center py-3 bg-white dark:bg-gray-800">
      <div class="flex items-center">
        <div class="relative">
          <SearchBar placeholder="Search for posts" />
        </div>
        <div>
          <button id="dropdownPostSearchButton" data-dropdown-toggle="dropdownPostSearch" class="inline-flex mt-2 ml-2 text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
            </svg>
          </button>
        
          <!-- Dropdown menu -->
          <div id="dropdownPostSearch" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownPostSearchButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
              </li>
            </ul>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete Post</a>
            </div>
          </div>
        </div>
      </div>
      <div class="flex mt-5 sm:mt-0">
        <div>
          <Button label="add post" hasicon rounded btn small>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </Button>
        </div>

        <a href="/export/posts" class="ml-2">
          <Button label="export" hasicon rounded light small>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
            </svg>
          </Button>
        </a>
      </div>
    </div>

    <!-- <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400 my-5"> -->
    <div class="relative overflow-x-auto">
      <table class="table-auto border my-border-gray">
        <thead class="text-xs text-white uppercase bg-sheet-100 dark:text-gray-200">
          <tr>
            <th scope="col" class="px-5 py-3.5">
              Post ID
            </th>
            <th scope="col" class="px-5 py-3.5">
              Post title
            </th>
            <th scope="col" class="px-5 py-3.5">
              Content
            </th>
            <!-- <th scope="col" class="px-5 py-3.5">
              Action
            </th> -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="post in posts.data" :key="post.id" class="bg-white border-b my-border-gray dark:text-gray-400 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900">
            <th scope="row" class="px-5 py-3.5">
              {{ post.id }}
            </th>
            <td class="px-5 py-3.5 font-medium">
              <span class="font-bold text-gray-900 dark:text-gray-200">{{ post.title }}</span>
              <br /><br /><span class="underline text-sm">category:</span> <br />{{ post.theme }}
              <br /><span class="underline font-semibold">by:</span> <br /><span class=" text-blue-700">{{ post.user }}</span>
              <br /><span class="underline font-semibold">at:</span> <br />{{ post.created_at }} <br />
              <div class="w-full mt-6">
                <div class="w-full">
                  <Link class="w-full" :href="route('admin.post.image.create', {post: post.id})">
                    <Button :label="'images ('+post.images_count+')'" hasicon rounded transparent large>
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                      </svg>
                    </Button>
                  </Link>
                </div>
                <div class="flex items-center justify-between w-full gap-2">
                  <div data-modal-target="customModal" data-modal-show="customModal">
                    <Button label="edit" hasicon rounded btn extrasmall>
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                      </svg>
                    </Button>
                  </div>
                  <div>
                    <Button label="block" hasicon rounded warning extrasmall>
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                      </svg>
                    </Button>
                  </div>
                  <div>
                    <Button label="delete" hasicon rounded danger extrasmall>
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                      </svg>
                    </Button>
                  </div>
                </div>
              </div>
            </td>
            <td class="px-5 py-3.5 relative text-justify">
              <p class="content" v-html="post.content" />
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Edit post modal -->
    <Modal title="Edit post">
      <template #default>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo voluptates optio,
        sapiente placeat non maiores? Quam soluta accusamus quisquam vel ullam expedita
        et quae est tempora exercitationem impedit, suscipit quaerat!
        <!-- <EditPost :advantages="advantages" :ingredients="ingredients" :weights="weights" :categories="categories" /> -->
      </template>
    </Modal>


    <div v-if="posts.data.length" class="w-full flex mt-8 mb-12">
      <pagination :links="posts.links" />
    </div>
  </div>
</template>

<script setup>
import pagination from '@/Components/paginationTable.vue'
import Button from '@/Components/button.vue'
// import EditPost from '@/Components/Post/EditPost.vue'
import Modal from '@/Components/modal.vue'
import SearchBar from '@/Components/Navbar/tools/searchBar.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  posts: Object,
  categories: Object,
})

</script>