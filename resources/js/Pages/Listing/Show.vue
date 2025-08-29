<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box class="col-span-7 flex items-center w-full">
      <div class="w-full text-center text-gray-500">No Images</div>
    </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box class="md:col-span-5">
        <template #header>Basic Info</template>
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing"></ListingSpace>
        <ListingAddress :listing="listing" />
      </Box>
      <Box>
        <template #header>Offer</template>
        Make an offer
      </Box>
    </div>
  </div>
</template>

<script setup>
import Box from '@/UI/Box.vue';
import ListingAddress from '../../UI/ListingAddress.vue';
import ListingSpace from '../../UI/ListingSpace.vue';
import Price from '../../UI/Price.vue';

defineProps({
  listing: Object,
});
</script>

<style scoped></style>
