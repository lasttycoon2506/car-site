<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 px-10 py-3">
        <div v-for="car in cars" :key="car.id">
            <CarCard>
                <div>
                    <Link :href="`/car/${car.id}`">
                    <img :src="`${car.pictures[0]}`" class="rounded-lg border border-black">
                    <span class="font-bold">{{ car.make }}</span> <span class="text-gray-500">| </span>
                    <span class="font-bold">{{ car.model }}</span> <span class="text-gray-500">| </span>
                    <span class="font-bold">{{ car.year }}</span> <span class="text-gray-500">| </span>
                    <span>Condition: </span><span class="font-bold">{{ car.condition }}</span> <span
                        class="text-gray-500">| </span>
                    <span class="font-bold">{{ car.drive_type }}</span> <span class="text-gray-500">| </span>
                    <span class="font-bold">{{ car.miles.toLocaleString() }}</span> mi. <span class="text-gray-500">|
                    </span>
                    <span class="font-bold">{{ car.mpg }}</span> mpg <span class="text-gray-500">| </span>
                    <span class="font-bold">
                        <PriceFormatter :price=car.price></PriceFormatter>
                    </span><span class="text-gray-500"> | </span>
                    <span class="font-bold">{{ car.transmission }}</span>
                    </Link>
                </div>
                <MonthlyPayment :car="car" />
                <span> / month</span>
                <!-- <div>
                    <Link :href="`/car/${car.id}/edit`">
                    Edit
                    </Link>
                </div>
                <div>
                    <Link :href="`/car/${car.id}`" method="delete">
                    Delete
                    </Link>
                </div> -->
            </CarCard>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ComputedRef } from "vue"
import type { Car } from "@/resources/types/car"
import Alert from "../../Components/Alert.vue"
import CarCard from "../../Components/CarCard.vue"
import PriceFormatter from "../../Components/PriceFormatter.vue"
import MonthlyPayment from "../../Components/MonthlyPayment.vue"
type PageProps = {
    0: { flash: { success: string } },
}
defineProps<{ cars: Car[] }>()

const page = usePage<PageProps>()
const alertMsg: ComputedRef<string> = computed(() => page.props[0].flash?.success)
</script>