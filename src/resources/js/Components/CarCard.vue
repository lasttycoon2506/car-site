<template>
    <div class="border border-grey-500 shadow-2xl rounded-lg px-3 py-3">
        <img v-if="car.images.length > 0" :src="`${car.images[0].file_url}`"
            class="rounded-lg border border-black w-[300px] h-[150px] mb-2">
        <div v-else class="flex items-center justify-center rounded-lg border border-black w-[250px] h-[150px] mb-2">
            No Image Provided</div>
        <div class="flex justify-evenly">
            <span class="font-bold">{{ car.make }}</span> <span class="text-gray-500">| </span>
            <span class="font-bold">{{ car.model }}</span> <span class="text-gray-500">| </span>
            <span class="font-bold">{{ car.year }}</span>
        </div>
        <div class="flex justify-evenly">
            <div>
                <span>Condition: </span><span class="font-bold">{{ car.condition }}</span>
            </div>
            <span class="text-gray-500">| </span>
            <div>
                <span>Drive: </span><span class="font-bold">{{ car.drive_type }}</span>
            </div>
        </div>
        <div class="flex justify-evenly">
            <span class="font-bold">{{ car.miles.toLocaleString() }}</span> mi. <span class="text-gray-500">|
            </span>
            <span class="font-bold">{{ car.mpg }}</span> mpg <span class="text-gray-500">| </span>
            <span class="font-bold">{{ car.transmission }}</span>
        </div>
        <div class="flex justify-center"><span class="font-bold">
                <PriceFormatter :price=car.price :allow-negative="false"></PriceFormatter>
            </span><span class="text-gray-500"> &nbsp or &nbsp</span>
            <MonthlyPayment :car="car" />
            <span> &nbsp/ month</span>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Car } from '@/resources/types/car';
import PriceFormatter from './PriceFormatter.vue';
import MonthlyPayment from './MonthlyPayment.vue';


defineProps<{ car: Car }>()
</script>