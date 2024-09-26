<script setup>
import DropdownLink from '@/components/DropdownLink.vue'
</script>

<template>
  <div class="text-sm flex flex-col bg-primary-200 py-10 w-1/6">
    <DropdownLink
      text="Omat lomakkeet"
      :sub-links="[
        { text: 'Oma lista', href: '/lista' },
        { text: 'Ilmoitukset', href: '/ilmoitukset' }
      ]"
    />
    <DropdownLink
      text="Hakemukset"
      :sub-links="[
        { text: 'Asiointilippu', href: '/asiointilippu' },
        { text: 'Kaupunkipyöräetu' }
      ]"
    />
    <DropdownLink
      text="Pyynnöt ja tilaukset"
      :sub-links="[
        { text: 'Tilauslomake' }
      ]"
    />
    <DropdownLink
      text="Työsuhdetietojen välitysjärjestelmä"
      :sub-links="[
        { text: 'Työntetkijät', href: '/tyontekijat' },
      ]"
    />
  </div>
</template>
