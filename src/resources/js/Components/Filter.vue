<template>
    <form @submit.prevent="applyFilter">
        <div class="flex justify-center mt-5 mx-10">
            <select v-model="filterOptions.condition" class="dropdown border-black">
                <option disabled value="">Condition</option>
                <option value="Ok" class="text-black">Ok</option>
                <option value="Good" class="text-black">Good</option>
                <option value="Great" class="text-black">Great</option>
                <option value="Excellent" class="text-black">Excellent</option>
                <option value="Like New" class="text-black">Like New</option>
            </select>
            <input v-model.number="filterOptions.priceFrom"
                class="w-1/12 rounded-l-lg ms-3 pe-2 text-center border-black" type="text" placeholder="price from">
            <input v-model.number="filterOptions.priceTo" class="w-1/12 rounded-r-lg me-3 text-center border-black"
                type="text" placeholder="price to">
            <select v-model="filterOptions.transmission" class="dropdown me-3 border-black">
                <option disabled value="">Transmission</option>
                <option value="Automatic" class="text-black">Automatic</option>
                <option value="Manual" class="text-black">Manual</option>
            </select>
            <select v-model="filterOptions.driveType" class="dropdown border-black">
                <option disabled value="">Drive Type</option>
                <option value="FWD" class="text-black">FWD</option>
                <option value="RWD" class="text-black">RWD</option>
                <option value="AWD" class="text-black">AWD</option>
                <option value="4WD" class="text-black">4WD</option>
            </select>
            <input v-model.number="filterOptions.miFrom" class="w-1/12 rounded-l-lg ms-3 text-center border-black"
                type="text" placeholder="mi. from">
            <input v-model.number="filterOptions.miTo" class="w-1/12 rounded-r-lg me-3 text-center border-black"
                type="text" placeholder="mi. to">
            <button type="submit" class="bg-orange-400 px-10 rounded-lg me-3 font-semibold">filter</button>
            <button type="reset" @click="resetFilter"
                class="bg-red-500 px-10 rounded-lg me-3 font-semibold">reset</button>
        </div>
    </form>
</template>

<script setup lang="ts">
import { InertiaForm, useForm } from "@inertiajs/vue3"
import type { FilterOptions } from "@/resources/types/filterOptions"

const props = defineProps<{ filters: FilterOptions }>()

const filterOptions: InertiaForm<FilterOptions> = useForm<FilterOptions>({
    condition: props.filters.condition ?? "",
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    transmission: props.filters.transmission ?? "",
    driveType: props.filters.driveType ?? "",
    miFrom: props.filters.miFrom ?? null,
    miTo: props.filters.miTo ?? null
})

const applyFilter: () => void =
    () => filterOptions.get("/cars", { preserveScroll: true, preserveState: true })

const resetFilter = () => {
    filterOptions.condition = ""
    filterOptions.priceFrom = null
    filterOptions.priceTo = null
    filterOptions.transmission = ""
    filterOptions.driveType = ""
    filterOptions.miFrom = null
    filterOptions.miTo = null
    applyFilter()
}
</script>