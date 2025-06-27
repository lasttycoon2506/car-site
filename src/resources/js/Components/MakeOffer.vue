<template>
    <form>
        <input v-model.number="props.price" type="text">
        <input v-model.number="props.price" type="range" :min="minOffer" :max="maxOffer" step="1000"
            class="cursor-pointer">
    </form>
</template>

<script setup lang="ts">
import { computed, ComputedRef } from 'vue';


const props = defineProps<{
    carId: number,
    price: number,
}>()

const minOffer: ComputedRef<number> = computed(() => props.price / 2)
const maxOffer: ComputedRef<number> = computed(() => props.price * 2)


</script>