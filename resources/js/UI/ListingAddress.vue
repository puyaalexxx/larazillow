<template>
  <span>
    {{ listing.street }} {{ listing.strret_nr }}, {{ listing.city }}
  </span>
</template>

<script setup>
defineProps({
  listing: Object,
});
</script>