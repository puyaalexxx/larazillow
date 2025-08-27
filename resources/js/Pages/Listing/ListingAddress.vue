<template>
  <span>
    {{ listing.street }} {{ listing.strret_nr }}, {{ listing.city }}, for ${{ listing.price }}
  </span>
</template>

<script setup>
defineProps({
  listing: Object,
});
</script>