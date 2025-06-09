<template>
    <div class="grid grid-cols-3 gap-5 px-10 py-3">
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
            <img :src="mainImage" class="rounded-lg max-h-80 mb-4" />
            <div class="flex gap-2">
                <img v-for="(pic, idx) in car.pictures" :key="idx" :src="pic"
                    class="rounded cursor-pointer w-20 h-20 object-cover border-2"
                    :class="{ 'border-black': mainImage === pic }" @click="mainImage = pic" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Car } from '@/resources/types/car';
import { ref } from 'vue'
import PriceFormatter from '../../Components/PriceFormatter.vue';

const props = defineProps<{ car: Car }>()
const mainImage = ref(props.car.pictures[0])
</script>
