<script setup>
import { inject } from 'vue';
import MainLayout from '@/layouts/MainLayout.vue';

const pageProps = inject('pageProps');
</script>
<template>
  <main-layout>
    <dynamic-page v-bind="pageProps" />
  </main-layout>
</template>