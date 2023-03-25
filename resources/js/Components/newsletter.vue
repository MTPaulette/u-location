<template>
  <div
    class="
      bg-onion-200
      rounded
      relative
      overflow-hidden
      text-center
      py-[60px]
      px-11
      lg:px-8"
  >
    <h3 class="font-semibold text-white mb-2 text-2xl">
      Join our newsletter!
    </h3>
    <p class="text-base text-white mb-8">
      Enter your email to receive our latest newsletter.
    </p>
    <form>
      <input
        type="email"
        placeholder="Your email address"
        class="
          w-full
          text-center
          h-[50px]
          text-sm
          font-medium
          bg-white bg-opacity-20
          placeholder-white
          text-white
          rounded
          mb-4
          outline-none
          border border-transparent
          focus-visible:shadow-none
          focus:border-white
        "
      />
      <input
        type="submit"
        value="Subscribe Now"
        class="
          w-full
          text-center
          h-[50px]
          text-sm
          font-medium
          text-white
          rounded
          bg-sheet-100
          mb-6
          cursor-pointer
          hover:shadow-lg hover:bg-opacity-90
        "
      />
    </form>
    <p class="text-sm font-medium text-white">
      Don't worry, we don't spam
    </p>
  </div>
</template>
<!-- <p>
          bg-[#13C296]</p> -->