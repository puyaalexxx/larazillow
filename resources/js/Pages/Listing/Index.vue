<template>
  <div class="grid frid-cols-3 gap-4 md:grid-cols-2 xl:grid-cols-3">
    <Listing v-for="listing in listings" :key="listing.id" :listing="listing"></Listing>
  </div>
</template>

<script setup>
import Listing from '@/Pages/Listing/Index/Components/Listing.vue';

defineProps({
  listings: Array,
});
</script>

<style scoped></style>
