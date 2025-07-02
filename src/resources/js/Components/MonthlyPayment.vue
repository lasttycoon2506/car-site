<template>
    <PriceFormatter :price="monthlyPayment" :allow-negative="false" />
    <slot></slot>
</template>


<script setup lang="ts">
import type { Car } from '@/resources/types/car';
import { useMonthlyPayment } from '../Composables/useMonthlyPayment';
import PriceFormatter from './PriceFormatter.vue';
import { ComputedRef } from 'vue';


const props = defineProps<{ car: Car }>()

const monthlyPayment: ComputedRef<number> = useMonthlyPayment(props.car.price, 3, 5)
</script>