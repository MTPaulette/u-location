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
      md:px-6 md:py-8
      lg:px-8 lg:py-[60px]"
  >
    <h3 class="font-semibold text-white mb-2 text-2xl">
      Rejoindre notre newsletter!
    </h3>
    <p class="text-base text-white mb-8">
      Entrer votre email pour recevoir notre dernière newsletter.
    </p>
    <form>
      <input
        type="email"
        placeholder="votre adresse email"
        class="
          w-full
          text-center
          h-[40px] md:h-[35px] lg:h-[50px]
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

      <button type="submit" class="submit-btn-style border-mango">souscrire </button>
      <!-- <input
        type="submit"
        value="Subscribe Now"
        class="
          w-full
          text-center
          h-[40px] md:h-[35px] lg:h-[50px]
          text-sm
          font-medium
          text-white
          rounded
          bg-mango
          mb-6
          cursor-pointer
          hover:shadow-lg hover:bg-opacity-90
        "
      /> -->
    </form>
    <p class="text-sm font-medium text-white">
      Ne vous inquiétez pas, nous ne spammons pas:
    </p>
  </div>
</template>

<script setup>
</script>