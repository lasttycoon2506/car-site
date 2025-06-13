<template>
    <form action="">
        <div class="flex justify-center mt-3">
            <select class="dropdown">
                <option disabled selected>Condition</option>
                <option value="Ok">Ok</option>
                <option value="Good">Good</option>
                <option value="Great">Great</option>
                <option value="Excellent">Excellent</option>
                <option value="Like New">Like New</option>
            </select>
            <input class="w-1/12 rounded-l-lg ms-5 text-center" type="text" placeholder="price from">
            <input class="w-1/12 rounded-r-lg me-5 text-center" type="text" placeholder="price to">
            <select class="dropdown me-5">
                <option disabled selected>Transmission</option>
                <option value="Automatic">Automatic</option>
                <option value="Manual">Manual</option>
            </select>
            <select class="dropdown">
                <option disabled selected>Drive Type</option>
                <option value="FWD">FWD</option>
                <option value="RWD">RWD</option>
                <option value="AWD">AWD</option>
                <option value="4WD">4WD</option>
            </select>
            <input class="w-1/12 rounded-l-lg ms-5 text-center" type="text" placeholder="mi. from">
            <input class="w-1/12 rounded-r-lg me-5 text-center" type="text" placeholder="mi. to">
            <button type="submit" class="bg-orange-400 px-10 rounded-lg me-5">filter</button>
            <button type="reset" class="bg-red-500 px-10 rounded-lg me-5">reset</button>
        </div>
    </form>
</template>

<script setup lang="ts">
import { InertiaForm, useForm } from "@inertiajs/vue3"
type FilterOptions = {
    condition: string
    priceFrom: number
    priceTo: number
    transmission: string
    driveType: string
    miFrom: number
    miTo: number
}


const carForm: InertiaForm<FilterOptions> = useForm<FilterOptions>({
    make: "",
    model: "",
    condition: "",
    transmission: "",
    drive_type: "",
    year: 0,
    mpg: 0,
    miles: 0,
    price: 0,
    pictures: ["jkl"]
})
</script>