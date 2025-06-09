<template>
    <div class="grid grid-cols-3 gap-5 px-10">
        <div class="grid col bg-sky-300 rounded-lg px-5 py-2">
            <span class="font-serif text-2xl">{{ car.make }}</span>
            <span class="font-serif text-2xl">{{ car.model }}</span>
            <span class="font-serif text-2xl">{{ car.year }}</span>
            <span class="font-serif text-2xl">{{ car.condition }}</span>
            <span class="font-serif text-2xl">{{ car.drive_type }}</span>
            <span class="font-serif text-2xl">{{ car.miles.toLocaleString() }}</span>
            <span class="font-serif text-2xl">{{ car.mpg }}</span>
            <span class="font-serif text-2xl">
                <PriceFormatter :price="car.price"></PriceFormatter>
            </span>
            <span class="font-serif text-2xl">{{ car.transmission }}</span>
        </div>
        <div class="col-span-2">
            <img :src="`${car.pictures[0]}`" class="rounded-lg">
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Car } from '@/resources/types/car';

defineProps<{ car: Car }>()
</script>