<template>
    <div class="outline rounded-md px-2 py-2">
        <div class="flex justify-around">
            <div>
                <div v-if="offer.accepted_at" class="bg-green-500 text-center px-1 py-1 rounded-md font-semibold">
                    Accepted!</div>
                <PriceFormatter :price="offer.amount" :allow-negative="false" class="text-xl"></PriceFormatter>
                <div>Made By: {{ offer.bidder.name }}</div>
                <div class="text-gray-500">Made: {{ offerMadeOn }}</div>
            </div>
            <div v-if="!isSold" class="flex items-center">
                <Link :href="`/seller/offer/${offer.id}/accept`" method="put"
                    class="rounded-lg bg-amber-400 py-2 px-10 font-semibold hover:bg-amber-800">
                Accept
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { OfferMade } from '@/resources/types/offerMade';
import PriceFormatter from './PriceFormatter.vue';
import { computed, ComputedRef } from 'vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps<{
    offer: OfferMade,
    isSold: boolean
}>()

const offerMadeOn: ComputedRef<string> = computed(() => new Date(props.offer.created_at).toLocaleDateString())
</script>