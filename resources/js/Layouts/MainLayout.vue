<script setup>
import HeaderLayout from '@/layouts/HeaderLayout.vue'
import FooterLayout from '@/layouts/FooterLayout.vue'
import SidebarLayout from '@/layouts/SidebarLayout.vue'
</script>

<template>
  <div class="bg-gray-50 flex flex-col min-h-screen">
    <!-- Header -->
    <header-layout class="mt-2 mx-2">
      <slot name="header" />
    </header-layout>

    <!-- Main Content Area with Sidebar -->
    <div class="flex flex-1">
      <!-- Sidebar Layout -->
      <sidebar-layout class="m-2">
        <slot name="sidebar" />
      </sidebar-layout>

      <!-- Main Content Area -->
      <main class="flex grow justify-center py-10 sm:px-6 md:px-12 w-full overflow-x-auto">
        <slot />
      </main>
    </div>

    <!-- Footer -->
    <footer-layout class="text-sm tracking-wide mb-2 mx-2">
      <slot name="footer" />
    </footer-layout>
  </div>
</template>