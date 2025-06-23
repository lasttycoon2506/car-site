<template>
    <h1 class="text-3xl">Your Cars</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-10 my-3">
        <div v-for="car in userCars">
            <div class="border border-grey-500 shadow-2xl rounded-lg px-3 py-3">
                <img :src="`${car.pictures[0]}`" class="rounded-lg border border-black">
                {{ car.make }}
                {{ car.model }}
                <div class="flex justify-center">

                    <Link :href="`/car/${car.id}/edit`">
                    <button class="rounded-lg bg-lime-500 py-2 px-6 font-bold hover:bg-lime-900">Edit</button>
                    </Link>


                    <Link :href="`/car/${car.id}`" method="delete">
                    <button class="rounded-lg bg-red-600 py-2 px-6 font-bold hover:bg-red-900">Delete</button>
                    </Link>

                </div>
            </div>

        </div>

    </div>

</template>

<script setup lang="ts">
import { Car } from '@/resources/types/car';
import CarCard from '../../Components/CarCard.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{ userCars: Car[] }>()

</script>