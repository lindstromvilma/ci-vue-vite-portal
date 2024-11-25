<script setup>
import { inject } from 'vue';
import MainLayout from '@/layouts/MainLayout.vue';
import PhpView from '@/components/PhpView.vue';

const pageProps = inject('pageProps');
</script>

<template>
  <main-layout>
    <template v-if="pageProps.isVue">
      <dynamic-page v-bind="pageProps" />
    </template>
    <template v-else>
      <php-view :url="pageProps.phpViewUrl" />
    </template>
  </main-layout>
</template>