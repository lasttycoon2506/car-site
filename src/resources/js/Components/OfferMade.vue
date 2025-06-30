<template>
    <div class="flex justify-between">
        <div class="font-semibold">Offer Made: </div>

    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    offerMade: any
}>()

console.log(typeof props.offerMade)
// const offerMadeOn = computed(() => new Date(props.))
</script>