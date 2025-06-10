<template>
    <div class="grid grid-cols-3 gap-5 mx-12 my-10">
        <div
            class="grid col bg-sky-300/50 rounded-lg px-5 py-3 me-12 border border-black bg-clip-padding shadow-xl font-serif text-2xl font-bold">
            <div>
                <span class="font-normal">Make: </span><span> {{ car.make }}</span>
            </div>
            <div>
                <span class="font-normal">Model: </span><span> {{ car.model }}</span>
            </div>
            <div>
                <span class="font-normal">Year: </span><span> {{ car.year }}</span>
            </div>
            <div>
                <span class="font-normal">Condition: </span><span> {{ car.condition }}</span>
            </div>
            <div>
                <span class="font-normal">Drive-Type: </span><span> {{ car.drive_type }}</span>
            </div>
            <div>
                <span class="font-normal">Miles: </span><span> {{ car.miles.toLocaleString() }}</span>
            </div>
            <div>
                <span class="font-normal">MPG: </span><span> {{ car.mpg }}</span>
            </div>
            <span>
                <PriceFormatter :price="car.price"></PriceFormatter>
            </span>
            <div>
                <span class="font-normal">Transmission: </span><span> {{ car.transmission }}</span>
            </div>
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
