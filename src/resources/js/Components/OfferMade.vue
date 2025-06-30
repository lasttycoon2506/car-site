<template>
    <div class="flex justify-between outline rounded-md py-2 px-2">
        <div class="font-semibold">Offer Made: </div>
        <div>{{ offerMadeOn }}</div>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import type { OfferMade } from "@/resources/types/offerMade"


const props = defineProps<{
    offerMade: OfferMade
}>()

const offerMadeOn = computed(() => new Date(props.offerMade.created_at).toLocaleDateString())
</script>