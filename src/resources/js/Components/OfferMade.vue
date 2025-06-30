<template>
    <div class="outline rounded-md mt-5 py-2 px-2">
        <div class="text-gray-500 text-md">Offer Made</div>
        <div class="text-3xl mb-1 font-bold">
            <PriceFormatter :price="props.offerMade.amount" :allow-negative="false" />
        </div>
        <div class="flex justify-between">
            <div class="font-semibold">Made: </div>
            <div>{{ offerMadeOn }}</div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import type { OfferMade } from "@/resources/types/offerMade"
import PriceFormatter from './PriceFormatter.vue';


const props = defineProps<{
    offerMade: OfferMade
}>()

const offerMadeOn = computed(() => new Date(props.offerMade.created_at).toLocaleDateString())
</script>