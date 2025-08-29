<template>
  <header class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg"><Link href="/listing">Listings</Link></div>
        <div class="text-lg text-indigo-600 dark:text-indigo-300 font-bold text-center">
          LaraZillow
        </div>
        <div class="text-lg">
          <Link href="/listing/create" class="btn-primary"> + New Listing </Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4">
    <div
      v-if="flashSuccess"
      class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-100 dark:bg-green-900 p-2"
    >
      {{ flashSuccess }}
    </div>

    <slot> </slot>
  </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

//page.props.value.flash.success
//const page = usePage();

const flashSuccess = computed(() => usePage().props.flash?.success);
</script>
