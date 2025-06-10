<template>
    <PriceFormatter :price="monthlyPayment" />
    <slot></slot>
</template>


<script setup lang="ts">
import { Car } from '@/resources/types/car';
import { useMonthlyPayment } from '../Composables/useMonthlyPayment';
import PriceFormatter from './PriceFormatter.vue';

const props = defineProps<{ car: Car }>()

const monthlyPayment = useMonthlyPayment(props.car.price, 3, 5)

</script>