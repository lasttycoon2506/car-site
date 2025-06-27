<template>
    <form @submit.prevent="makeOffer()">
        <div>
            <input v-model.number="offerForm.amount" type="text">
        </div>
        <div> <input v-model.number="offerForm.amount" type="range" :min="minOffer" :max="maxOffer" step="1000"
                class="cursor-pointer">
        </div>
        <div>
            <button type="submit">Make Offer</button>
        </div>
        <div class="flex justify-between">
            <div>Difference</div>
            <PriceFormatter :price="offerDifference" />
        </div>
    </form>
</template>

<script setup lang="ts">
import { InertiaForm, useForm } from '@inertiajs/vue3';
import { computed, ComputedRef } from 'vue';
import PriceFormatter from './PriceFormatter.vue';


const props = defineProps<{
    carId: number,
    price: number,
}>()
const offerForm: InertiaForm<{ amount: number; }> =
    useForm<{ amount: number }>({ amount: props.price })

const minOffer: ComputedRef<number> = computed(() => props.price / 2)
const maxOffer: ComputedRef<number> = computed(() => props.price * 2)
const offerDifference = computed(() => offerForm.amount - props.price)

const makeOffer = () => {
}


</script>