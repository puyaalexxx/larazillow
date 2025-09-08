<template>
  <header class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg"><Link href="/listing">Listings</Link></div>
        <div class="text-lg text-indigo-600 dark:text-indigo-300 font-bold text-center">
          LaraZillow
        </div>
        <div v-if="user" class="flex items-center text-lg">
          <Link class="text-sm text-gray-500 mr-4 font-bold" href="/realtor/listings">{{ user.name }}</Link>
          <Link href="/realtor/listings/create" class="btn-primary"> + New Listing </Link>

          <div>
            <Link
              href="/logout"
              class="ml-4 hover:underline font-bold text-gray-500"
              method="delete"
              >Logout</Link
            >
          </div>
        </div>
        <div v-else class="flex items-center gap-2">
          <Link href="/user-account/create" class="btn-primary">Register</Link>
          <Link href="/login" class="btn-primary">Sign-In</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4 w-full">
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
const page = usePage();

const flashSuccess = computed(() => page.props.flash?.success);

const user = computed(() => page.props.user);
</script>
