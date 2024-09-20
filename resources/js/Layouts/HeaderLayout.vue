<script setup>
import {ref} from 'vue'
import HeaderLink from '../Components/HeaderLink.vue'
import User from '@/Components/Icons/User.vue'

const isSideNavOpen = ref(false)

const toggleSideNav = () => {
	isSideNavOpen.value = !isSideNavOpen.value
}

const closeSideNav = () => {
	isSideNavOpen.value = false
}
</script>

<template #header>
  <div>
    <nav class="flex items-center justify-between gap-8 bg-primary text-white font-medium text-sm py-4 px-10">
      <a
        href="/"
        class="text-4xl font-normal"
      >
        Luukku 2.0
      </a>
      <div class="flex gap-4 flex-grow">
        <HeaderLink text="Omat lomakkeet" />
        <HeaderLink text="Lomakkeet" />
        <HeaderLink text="Muita ilmoituksia" />
      </div>
      <div class="flex flex-col items-center gap-1 cursor-pointer">
        <div class="flex gap-2 items-center">
          <User class="h-4 stroke-white" />
          <a>Kirjautunut käyttäjä</a>
        </div>
        <p>Toimiala</p>
      </div>
    </nav>
  </div>
</template>