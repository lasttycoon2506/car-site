<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <Filter :filters="props.filters"></Filter>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-10 my-3">
        <div v-for="car in cars.data" :key="car.id">
            <Link :href="`/car/${car.id}`">
            <CarCard :car=car>
            </CarCard>
            </Link>
        </div>
    </div>
    <div v-if="cars.data.length" class="flex flex-col items-center mt-5 mb-5">
        <div class="mb-3">
            <span class="font-semibold">{{ props.cars.total }}</span> cars
        </div>
        <div>
            <Pagination :links="cars.links" />
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ComputedRef } from "vue"
import type { Cars } from "@/resources/types/cars"
import Alert from "../../Components/Alert.vue"
import CarCard from "../../Components/CarCard.vue"
import Pagination from "../../Components/Pagination.vue"
import Filter from "../../Components/Filter.vue"
import { FilterOptions } from "@/resources/types/filterOptions"

type PageProps = {
    flash: { success: string },
}
const props = defineProps<{
    cars: Cars,
    filters: FilterOptions
}>()

const page = usePage<PageProps>()
const alertMsg: ComputedRef<string> = computed(() => page.props.flash?.success)
</script>