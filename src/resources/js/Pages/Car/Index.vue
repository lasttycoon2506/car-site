<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <Filter></Filter>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 px-10 py-3">
        <div v-for="car in cars.data" :key="car.id">
            <CarCard>
                <div>
                    <Link :href="`/car/${car.id}`">
                    <img :src="`${car.pictures[0]}`" class="rounded-lg border border-black">
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
                        <span class="font-bold">{{ car.miles.toLocaleString() }}</span> mi. <span
                            class="text-gray-500">|
                        </span>
                        <span class="font-bold">{{ car.mpg }}</span> mpg <span class="text-gray-500">| </span>
                        <span class="font-bold">{{ car.transmission }}</span>
                    </div>
                    <div class="flex justify-center"><span class="font-bold">
                            <PriceFormatter :price=car.price></PriceFormatter>
                        </span><span class="text-gray-500"> &nbsp or &nbsp</span>
                        <MonthlyPayment :car="car" />
                        <span> &nbsp/ month</span>
                    </div>
                    </Link>
                </div>
                <div>
                    <Link :href="`/car/${car.id}/edit`">
                    Edit
                    </Link>
                </div>
                <div>
                    <Link :href="`/car/${car.id}`" method="delete">
                    Delete
                    </Link>
                </div>
            </CarCard>
        </div>
    </div>
    <div v-if="cars.data.length" class="flex justify-center mt-5 mb-5">
        <Pagination :links="cars.links" />
    </div>
</template>

<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ComputedRef } from "vue"
import type { Cars } from "@/resources/types/cars"
import Alert from "../../Components/Alert.vue"
import CarCard from "../../Components/CarCard.vue"
import PriceFormatter from "../../Components/PriceFormatter.vue"
import MonthlyPayment from "../../Components/MonthlyPayment.vue"
import Pagination from "../../Components/Pagination.vue"
import Filter from "../../Components/Filter.vue"
import { FilterOptions } from "@/resources/types/filterOptions"

type PageProps = {
    flash: { success: string },
    filters: FilterOptions
}
defineProps<{ cars: Cars }>()

const page = usePage<PageProps>()
const alertMsg: ComputedRef<string> = computed(() => page.props.flash?.success)
</script>