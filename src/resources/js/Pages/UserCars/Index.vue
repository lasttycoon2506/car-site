<template>
    <h1>testing</h1>
    <div v-for="car in userCars">
        <CarCard> {{ car.make }}</CarCard>
    </div>
    <section></section>
</template>

<script setup lang="ts">
import { Car } from '@/resources/types/car';
import CarCard from '../../Components/CarCard.vue';

defineProps<{ userCars: Car[] }>()

</script>