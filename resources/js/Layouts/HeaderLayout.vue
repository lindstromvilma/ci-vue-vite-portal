<script setup>
import { ref } from 'vue'
import HeaderLink from '../Components/HeaderLink.vue'
import Hamburger from '@/Components/Icons/Hamburger.vue'
import User from '@/Components/Icons/User.vue'

const isMobileMenuOpen = ref(false)

const toggleMobileMenu = () => {
	isMobileMenuOpen.value = !isMobileMenuOpen.value
}
</script>

<template #header>
  <div>
    <nav class="text-white flex items-center justify-between gap-8 bg-primary font-medium text-sm py-4 sm:px-6 md:px-10 rounded">
      <Hamburger
        class="h-7 sm:inline-block md:hidden cursor-pointer hover:scale-110 transition duration-200 ease-in-out"
        @click="toggleMobileMenu"
      />
      <a
        href="/"
        class="text-2xl font-medium"
      >
        Portaali
      </a>
      <div class="sm:hidden md:flex gap-4 flex-grow">
        <HeaderLink text="Oma osio" />
        <HeaderLink text="Lomakkeet" />
        <HeaderLink text="Ilmoitukset" />
      </div>
      <a href="/omat-tiedot">
        <User
          class="h-7 cursor-pointer hover:scale-110 transition duration-200 ease-in-out"
        />
      </a>
    </nav>
    <div
      v-if="isMobileMenuOpen"
      class="sm:flex md:hidden flex-col bg-primary-50 py-4 px-6 rounded m-2"
    >
      <HeaderLink text="Oma osio" />
      <HeaderLink text="Lomakkeet" />
      <HeaderLink text="Ilmoitukset" />
    </div>
  </div>
</template>