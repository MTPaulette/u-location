<template>
  <div id="editUserModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <form action="#" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Edit user
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserModal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>  
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
              <label for="first-name" class="label">First Name</label>
              <input id="first-name" type="text" name="first-name" class="input" placeholder="Bonnie" />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="last-name" class="label">Last Name</label>
              <input id="last-name" type="text" name="last-name" class="input" placeholder="Green" />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="email" class="label">Email</label>
              <input id="email" type="email" name="email" class="input" placeholder="example@company.com" />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="phone-number" class="label">Phone Number</label>
              <input id="phone-number" type="number" name="phone-number" class="input" placeholder="e.g. +(12)3456 789" />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="department" class="label">Department</label>
              <input id="department" type="text" name="department" class="input" placeholder="Development" />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="company" class="label">Company</label>
              <input id="company" type="number" name="company" class="input" placeholder="123456" />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="current-password" class="label">Current Password</label>
              <input id="current-password" type="password" name="current-password" class="input" placeholder="••••••••" />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="new-password" class="label">New Password</label>
              <input id="new-password" type="password" name="new-password" class="input" placeholder="••••••••" />
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 border-t my-border-gray rounded-b dark:border-gray-600">
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
        </div>
      </form>
    </div>
  </div>
</template>