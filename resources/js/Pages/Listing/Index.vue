<template>
  <div class="grid frid-cols-3 gap-4 md:grid-cols-2 xl:grid-cols-3">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing"></Listing>
  </div>
  <div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb-8">
    <Pagination :links="listings.links"></Pagination>
  </div>
</template>

<script setup>
import Listing from '@/Pages/Listing/Index/Components/Listing.vue';
import Pagination from '@/UI/Pagination.vue';

defineProps({
  listings: Object,
});
</script>

<style scoped></style>
