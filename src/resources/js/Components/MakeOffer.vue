<template>
    <form @submit.prevent="makeOffer()">
        <div class="flex justify-start items-center">
            <span class="mr-1 font-bold text-lg">$</span>
            <input v-model.number="offerForm.amount" type="text" class="rounded-md my-1">
        </div>
        <div> <input v-model.number="offerForm.amount" type="range" :min="minOffer" :max="maxOffer" step="100"
                class="cursor-pointer my-2 w-full">
        </div>
        <div>
            <button type="submit" class="bg-lime-500 rounded-md py-2 w-full my-1 mb-2">Make Offer</button>
        </div>
        <div class="flex justify-between">
            <div class="font-semibold">Difference</div>
            <PriceFormatter :price="offerDifference" :allow-negative="true" class="font-bold" />
        </div>
    </form>
</template>

<script setup lang="ts">
import { InertiaForm, useForm } from '@inertiajs/vue3';
import { computed, ComputedRef, watch } from 'vue';
import PriceFormatter from './PriceFormatter.vue';
import debounce from 'lodash/debounce';


const props = defineProps<{
    carId: number,
    price: number,
}>()
const offerForm: InertiaForm<{ amount: number; }> =
    useForm<{ amount: number }>({ amount: props.price })
const emit: __VLS_Emit = defineEmits<{
    (event: 'updatedOffer', value: number): void
}>()

const minOffer: ComputedRef<number> = computed(() => Math.round(props.price / 2))
const maxOffer: ComputedRef<number> = computed(() => Math.round(props.price * 2))
const offerDifference: ComputedRef<number> = computed(() => offerForm.amount - props.price)

const makeOffer: () => void
    = () =>
        offerForm.post(`/car/${props.carId}/offer`)

watch(
    () => offerForm.amount,
    debounce((value: number) => emit('updatedOffer', value), 300)
)
</script>