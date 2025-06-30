<template>
    <div class="grid grid-cols-3 mx-10 my-5">
        <div class="col-span-2">toots</div>
        <div
            class="grid col bg-sky-300/50 rounded-lg px-5 py-3 me-12 border border-black bg-clip-padding shadow-xl font-serif text-2xl font-bold">
            <div>
                <span class="font-normal text-xl">Make: </span><span> {{ car.make }}</span>
            </div>
            <div>
                <span class="font-normal text-xl">Model: </span><span> {{ car.model }}</span>
            </div>
            <div>
                <span class="font-normal text-xl">Year: </span><span> {{ car.year }}</span>
            </div>
            <div>
                <span class="font-normal text-xl">Condition: </span><span> {{ car.condition }}</span>
            </div>
            <div>
                <span class="font-normal text-xl">Drive-Type: </span><span> {{ car.drive_type }}</span>
            </div>
            <div>
                <span class="font-normal text-xl">Miles: </span><span> {{ car.miles.toLocaleString() }}</span>
            </div>
            <div>
                <span class="font-normal text-xl">MPG: </span><span> {{ car.mpg }}</span>
            </div>
            <span>
                <PriceFormatter :price="car.price" :allow-negative="false"></PriceFormatter>
            </span>
            <div>
                <span class="font-normal text-xl">Transmission: </span><span> {{ car.transmission }}</span>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Car } from '@/resources/types/car';
import PriceFormatter from '../../Components/PriceFormatter.vue';


const props = defineProps<{
    car: Car,
}>()

console.log(props.car)

</script>