<template>
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="`/listing/${listing.id}`">
      <ListingAddress :listing="listing" />
    </Link>
  </div>
</template>

<script setup>
import ListingAddress from './ListingAddress.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
  listings: Array,
});
</script>

<style scoped></style>