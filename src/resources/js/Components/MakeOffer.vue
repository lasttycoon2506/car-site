<template>
    <form @submit.prevent="makeOffer()">
        <input v-model.number="offerForm.amount" type="text">
        <input v-model.number="offerForm.amount" type="range" :min="minOffer" :max="maxOffer" step="1000"
            class="cursor-pointer">
        <button type="submit">Make Offer</button>
    </form>
</template>

<script setup lang="ts">
import { InertiaForm, useForm } from '@inertiajs/vue3';
import { computed, ComputedRef } from 'vue';


const props = defineProps<{
    carId: number,
    price: number,
}>()
const offerForm: InertiaForm<{ amount: number; }> =
    useForm<{ amount: number }>({ amount: props.price })

const minOffer: ComputedRef<number> = computed(() => props.price / 2)
const maxOffer: ComputedRef<number> = computed(() => props.price * 2)

const makeOffer = () => {
}


</script>