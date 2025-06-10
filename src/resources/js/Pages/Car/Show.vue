<template>
    <div class="grid grid-cols-4 gap-5 mx-12 my-10">
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
        <div class=" ms-8">
            <h1 class="font-bold text-xl mb-5">Pay As You Go!</h1>
            <label class="block font-medium">Interest: <span class=" font-bold">{{ interestRate }}%</span></label>
            <input v-model.number="interestRate" type="range" min=".1" max="25" step=".1" class="cursor-pointer">
            <label class="block font-medium">Period: <span class="font-bold">{{ duration }} years</span></label>
            <input v-model.number="duration" type="range" min="1" max="25" step="1" class="cursor-pointer">
            <label class="block font-medium mt-2">You Pay: </label>
            <div class="flex justify-start items-center">
                <div class="text-2xl font-bold">
                    <PriceFormatter :price="monthlyPayment"></PriceFormatter>
                </div>
                <span> &nbsp; / month</span>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Car } from '@/resources/types/car';
import { computed, ComputedRef, Ref, ref } from 'vue'
import PriceFormatter from '../../Components/PriceFormatter.vue';

const props = defineProps<{ car: Car }>()
const mainImage = ref(props.car.pictures[0])
const interestRate: Ref<number> = ref(3)
const duration: Ref<number> = ref(5)

const monthlyPayment: ComputedRef<number> = computed(() => {
    const price = props.car.price
    const monthlyInterest = interestRate.value / 100 / 12
    const monthsOfPayment = duration.value * 12

    return price * monthlyInterest * (Math.pow(1 + monthlyInterest, monthsOfPayment)) / (Math.pow(1 + monthlyInterest, monthsOfPayment) - 1)
})
</script>
