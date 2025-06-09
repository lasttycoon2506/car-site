<template>
    <div class="grid grid-cols-3 gap-5 px-10 py-10">
        <div
            class="grid col bg-sky-300/50 rounded-lg px-5 py-2 me-10 border-4 bg-clip-padding shadow-xl font-serif text-2xl font-bold">
            <span>{{ car.make }}</span>
            <span>{{ car.model }}</span>
            <span>{{ car.year }}</span>
            <span>{{ car.condition }}</span>
            <span>{{ car.drive_type }}</span>
            <span>{{ car.miles.toLocaleString() }}</span>
            <span>{{ car.mpg }} mpg</span>
            <span>
                <PriceFormatter :price="car.price"></PriceFormatter>
            </span>
            <span>{{ car.transmission }}</span>
        </div>
        <div class="col-span-2">
            <img :src="mainImage" class="rounded-xl border border-black max-h-80 mb-4" />
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
