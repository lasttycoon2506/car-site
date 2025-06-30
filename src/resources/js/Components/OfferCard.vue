<template>
    <PriceFormatter :price="offer.amount" :allow-negative="false"></PriceFormatter>
    <div>{{ offerMadeOn }}</div>
</template>

<script setup lang="ts">
import { OfferMade } from '@/resources/types/offerMade';
import PriceFormatter from './PriceFormatter.vue';
import { computed, ComputedRef } from 'vue';



// id: number;
// accepted_at: string;
// amount: number;
// bidder_id: number;
// car_id: number;
// created_at: string;
// declined_at: string;
// updated_at: string;


const props = defineProps<{
    offer: OfferMade,
}>()

const offerMadeOn: ComputedRef<string> = computed(() => new Date(props.offer.created_at).toLocaleDateString())
</script>