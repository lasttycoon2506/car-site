<template>
    <Filter :filters="props.filters"></Filter>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-10 my-3">
        <div v-for="car in cars.data" :key="car.id">
            <Link :href="`/car/${car.id}`">
            <CarCard :car=car>
            </CarCard>
            </Link>
        </div>
    </div>
    <div v-if="cars.data.length" class="flex flex-col items-center my-10">
        <div class="mb-3">
            <span class="font-semibold">{{ props.cars.total }}</span> cars
        </div>
        <div>
            <Pagination :links="cars.links" />
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3"
import type { Cars } from "@/resources/types/cars"
import CarCard from "../../Components/CarCard.vue"
import Pagination from "../../Components/Pagination.vue"
import Filter from "../../Components/Filter.vue"
import { FilterOptions } from "@/resources/types/filterOptions"


const props = defineProps<{
    cars: Cars,
    filters: FilterOptions
}>()
</script>