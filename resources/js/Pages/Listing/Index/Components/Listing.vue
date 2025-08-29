<template>
  <Box>
    <div>
      <Link :href="route('listing.show', { listing: listing.id })">
        <div class="flex items-center">
          <Price :price="listing.price" class="text-2xl font-bold" /> &nbsp;
          <div class="text-xs text-gray-500"><Price :price="monthlyPayment" /> mp</div>
        </div>
        <ListingSpace :listing="listing"></ListingSpace>
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
  </Box>
</template>

<script setup>
import { route } from 'ziggy-js';
import ListingAddress from '@/UI/ListingAddress.vue';
import ListingSpace from '@/UI/ListingSpace.vue';
import Price from '@/UI/Price.vue';
import { Link } from '@inertiajs/vue3';
import Box from '@/UI/Box.vue';
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';

const props = defineProps({
  listing: Object,
});

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>

<style scoped></style>
