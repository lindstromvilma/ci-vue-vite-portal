<script setup>
import DropdownLink from '@/components/DropdownLink.vue'
import Folder from '@/Components/Icons/Folder.vue'
import Document from '@/Components/Icons/Document.vue'
import Megaphone from '@/Components/Icons/Megaphone.vue'
</script>

<template>
  <div class="text-sm sm:hidden md:flex flex-col bg-primary-50 py-10 w-max rounded">
    <DropdownLink
      text="Oma osio"
      :icon="Folder"
      :sub-links="[
        { text: 'Oma lista', href: '/lista' },
        { text: 'Ilmoitukset', href: '/ilmoitukset' }
      ]"
    />
    <DropdownLink
      text="Hakemukset"
      :icon="Document"
      :sub-links="[
        { text: 'Asiointilippu', href: '/asiointilippu' },
        { text: 'Kaupunkipyöräetu' }
      ]"
    />
    <DropdownLink
      text="Tilaukset"
      :icon="Megaphone"
      :sub-links="[
        { text: 'Tilauslomake', href: '/lomake' }
      ]"
    />
    <DropdownLink
      text="Organisaatio"
      :icon="Folder"
      :sub-links="[
        { text: 'Työntekijät', href: '/tyontekijat' },
        { text: 'Kertapalkkiot', href: '/tyontekijat/kertapalkkiot' },
      ]"
    />
  </div>
</template>
