<template>
  <div v-for="listing in listings" :key="listing.id">
    <div>
      <Link :href="route('listing.show', { listing: listing.id })">
        <ListingAddress :listing="listing" />
      </Link>
    </div>
    <div>
      <Link :href="route('listing.edit', { listing: listing.id })">Edit</Link>
    </div>
    <div>
      <Link :href="route('listing.destroy', { listing: listing.id })" method="DELETE" as="button"
        >Delete</Link
      >
    </div>
  </div>
</template>

<script setup>
import { route } from 'ziggy-js';
import ListingAddress from './ListingAddress.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
  listings: Array,
});
</script>

<style scoped></style>
