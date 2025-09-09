<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box class="col-span-7 flex items-center w-full">
      <div v-for="image in listing.images" :key="image.id" class="grid grid-col-2 gap-1">
        <img :src="image.src" class="rounded-md" width="150" />
      </div>
    </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box class="md:col-span-5">
        <template #header>Basic Info</template>
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing"></ListingSpace>
        <ListingAddress :listing="listing" />
      </Box>
      <Box>
        <template #header>Monthly Payment</template>
        <div>
          <label class="label">Interest rate ({{ interestRate }})</label>
          <input
            v-model.number="interestRate"
            type="range"
            min="0.1"
            max="30"
            step="0.1"
            class="w-full h4 bg-gray-200 rounded-lg appearance-once cursor-pointer dark:bg-gray-700"
          />

          <label class="label">IDuration ({{ duration }} years)</label>
          <input
            v-model.number="duration"
            type="range"
            min="3"
            max="35"
            step="1"
            class="w-full h4 bg-gray-200 rounded-lg appearance-once cursor-pointer dark:bg-gray-700"
          />
        </div>
        <div class="text-grey-600 dark:text-gray-300 mt2">
          <div class="text-grey-400">Your monthly payment</div>
          <Price :price="monthlyPayment" class="text-3xl font-bold" />
        </div>

        <div class="mt-2 text-gray-500">
          <div class="flex justify-between">
            <div>Total Paid</div>
            <div>
              <Price :price="totalPaid" class="font-medium" />
            </div>
          </div>
          <div class="flex justify-between">
            <div>Principal Paid</div>
            <div>
              <Price :price="listing.price" class="font-medium" />
            </div>
          </div>
          <div class="flex justify-between">
            <div>Interest Paid</div>
            <div>
              <Price :price="totalInterest" class="font-medium" />
            </div>
          </div>
        </div>
      </Box>
    </div>
  </div>
</template>

<script setup>
import Box from '@/UI/Box.vue';
import ListingAddress from '@/UI/ListingAddress.vue';
import ListingSpace from '@/UI/ListingSpace.vue';
import Price from '@/UI/Price.vue';
import { ref, computed } from 'vue';
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';

const props = defineProps({
  listing: Object,
});

const interestRate = ref(2.5);
const duration = ref(25);
const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
  props.listing.price,
  interestRate,
  duration,
);
</script>

<style scoped></style>
