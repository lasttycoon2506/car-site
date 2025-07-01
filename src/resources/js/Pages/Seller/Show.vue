<template>
    <div class="grid grid-cols-3 mx-12 my-5">
        <div class="col-span-2">
            <div v-for="offer in car.offers" :key="offer.id">
                <OfferCard :offer="offer" :is-sold="car.sold_at !== null"></OfferCard>
            </div>
        </div>
        <div>
            <CarDetails :car="car"></CarDetails>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Car } from '@/resources/types/car';
import CarDetails from '../../Components/CarDetails.vue';
import OfferCard from '../../Components/OfferCard.vue';


defineProps<{
    car: Car,
}>()


</script>