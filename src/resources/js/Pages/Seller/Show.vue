<template>
    <div class="grid grid-cols-3 mx-10 my-5">
        <div class="col-span-2">
            <div v-for="offer in car.offers">
                {{ offer }}
            </div>
        </div>
        <div>
            <CarDetails :car="car"></CarDetails>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Car } from '@/resources/types/car';
import CarDetails from '../../Components/CarDetails.vue';


defineProps<{
    car: Car,
}>()


</script>