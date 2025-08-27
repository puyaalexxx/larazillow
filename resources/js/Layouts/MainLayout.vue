<template>
  <Link href="/">Index Page</Link>
  <Link href="/show">Show Page </Link>

  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>

  <slot> </slot>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

//page.props.value.flash.success
const page = usePage();

const flashSuccess = computed(() => page.props.flash?.success);

console.log(page.props);
</script>

<style scoped>
.success {
  background-color: green;
}
</style>
