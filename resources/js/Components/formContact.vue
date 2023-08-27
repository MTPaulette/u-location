<template>
  <div class="rounded-lg px-6 py-0 md:px-4 md:py-0">
    <h3 class="font-semibold mb-8 text-2xl md:text-[26px] text-gray-900 dark:text-gray-100">
      Laisser un Message
    </h3>

    
    <form>
      <div class="mb-6">
        <label for="fullName" class="label">Nom<span class="required">*</span></label>
        <input
          type="text"
          name="fullName"
          placeholder="Adam Gelius"
          class="input"
        />
      </div>
      <div class="mb-6">
        <label for="email" class="label">Email<span class="required">*</span></label>
        <input
          type="email"
          name="email"
          placeholder="example@yourmail.com"
          class="input"
        />
      </div>
      <div class="mb-6">
        <label for="phone" class="label">Telephone<span class="required">*</span></label>
        <input
          type="text"
          name="phone"
          placeholder="+885 1254 5211 552"
          class="input"
        />
      </div>
      <div class="mb-6">
        <label for="message" class="label">Message<span class="required">*</span></label>
        <textarea id="message" rows="4" class="text-area" placeholder="Leave a comment..." />
      </div>

      <div class="mb-0">
        <!-- <Button label="envoyer" success rounded large /> -->
        <button type="submit" class="submit-btn-style">envoyer</button>
      </div>
    </form>
  </div>
</template>
