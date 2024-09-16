<script setup>
import HeaderLayout from '@/layouts/HeaderLayout.vue'
import FooterLayout from '@/layouts/FooterLayout.vue'
import SidebarLayout from '@/layouts/SidebarLayout.vue'
</script>

<template>
  <div class="flex flex-col min-h-screen">
    <!-- Header -->
    <header-layout>
      <slot name="header" />
    </header-layout>

    <!-- Main Content Area with Sidebar -->
    <div class="flex flex-1">
      <!-- Sidebar Layout -->
      <sidebar-layout>
        <slot name="sidebar" />
      </sidebar-layout>

      <!-- Main Content Area -->
      <main class="flex grow justify-center bg-gray-50 py-10 px-12">
        <slot />
      </main>
    </div>

    <!-- Footer -->
    <footer-layout class="text-white text-sm tracking-wide">
      <slot name="footer" />
    </footer-layout>
  </div>
</template>