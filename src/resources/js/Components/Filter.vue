<template>
    <form action="">
        <div class="flex justify-center mt-3">
            <select v-model="filterOptions.condition" class="dropdown">
                <option disabled value="">Condition</option>
                <option value="Ok" class="text-black">Ok</option>
                <option value="Good" class="text-black">Good</option>
                <option value="Great" class="text-black">Great</option>
                <option value="Excellent" class="text-black">Excellent</option>
                <option value="Like New" class="text-black">Like New</option>
            </select>
            <input v-model.number="filterOptions.priceFrom" class="w-1/12 rounded-l-lg ms-5 text-center" type="text"
                placeholder="price from">
            <input v-model.number="filterOptions.priceTo" class="w-1/12 rounded-r-lg me-5 text-center" type="text"
                placeholder="price to">
            <select v-model="filterOptions.transmission" class="dropdown me-5">
                <option disabled value="">Transmission</option>
                <option value="Automatic" class="text-black">Automatic</option>
                <option value="Manual" class="text-black">Manual</option>
            </select>
            <select v-model="filterOptions.driveType" class="dropdown">
                <option disabled value="">Drive Type</option>
                <option value="FWD" class="text-black">FWD</option>
                <option value="RWD" class="text-black">RWD</option>
                <option value="AWD" class="text-black">AWD</option>
                <option value="4WD" class="text-black">4WD</option>
            </select>
            <input v-model.number="filterOptions.miFrom" class="w-1/12 rounded-l-lg ms-5 text-center" type="text"
                placeholder="mi. from">
            <input v-model.number="filterOptions.miTo" class="w-1/12 rounded-r-lg me-5 text-center" type="text"
                placeholder="mi. to">
            <button type="submit" class="bg-orange-400 px-10 rounded-lg me-5">filter</button>
            <button type="reset" class="bg-red-500 px-10 rounded-lg me-5">reset</button>
        </div>
    </form>
</template>

<script setup lang="ts">
import { InertiaForm, useForm } from "@inertiajs/vue3"
type FilterOptions = {
    condition: string
    priceFrom: number | null
    priceTo: number | null
    transmission: string
    driveType: string
    miFrom: number | null
    miTo: number | null
}
// defineProps<{ filters: FilterOptions }>()


const filterOptions: InertiaForm<FilterOptions> = useForm<FilterOptions>({
    condition: "",
    priceFrom: null,
    priceTo: null,
    transmission: "",
    driveType: "",
    miFrom: null,
    miTo: null
})
</script>