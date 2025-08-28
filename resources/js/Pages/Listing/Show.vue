<template>
  <span>
    <ListingAddress :listing="listing" />
  </span>
</template>

<script setup>
import ListingAddress from '../../UI/ListingAddress.vue';

defineProps({
  listing: Object,
});
</script>

<style scoped></style>
