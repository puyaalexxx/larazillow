<template>
  <div class="grid frid-cols-3 gap-4 md:grid-cols-2 xl:grid-cols-3">
    <Box v-for="listing in listings" :key="listing.id">
      <div>
        <Link :href="route('listing.show', { listing: listing.id })">
          <Price :price="listing.price" class="text-2xl font-bold" />
          <ListingSpace :listing="listing"></ListingSpace>
          <ListingAddress :listing="listing" />
        </Link>
      </div>
      <div>
        <Link :href="route('listing.edit', { listing: listing.id })">Edit</Link>
      </div>
      <div>
        <Link :href="route('listing.destroy', { listing: listing.id })" method="DELETE" as="button">Delete</Link>
      </div>
    </Box>
  </div>
</template>

<script setup>
import { route } from 'ziggy-js';
import ListingAddress from '../../UI/ListingAddress.vue';
import ListingSpace from '../../UI/ListingSpace.vue';
import Price from '../../UI/Price.vue';
import { Link } from '@inertiajs/vue3';
import Box from '@/UI/Box.vue';

defineProps({
  listings: Array,
});
</script>

<style scoped></style>
