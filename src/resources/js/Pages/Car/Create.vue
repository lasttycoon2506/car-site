<template>
    <h1 class="flex text-shadow-lg font-bold justify-center text-4xl mt-5">Sell Your Car!</h1>
    <form @submit.prevent="createCar">
        <div class="grid grid-cols-2 mx-12 my-5 bg-slate-400 rounded-lg py-5 px-12">
            <div class="mx-12">
                <label class="label">Make</label>
                <input v-model="carForm.make" type="text" class="input">
                <div v-if="carForm.errors.make">{{ carForm.errors.make }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Model</label>
                <input v-model="carForm.model" type="text" class="input">
                <div v-if="carForm.errors.model">{{ carForm.errors.model }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Condition</label>
                <input v-model="carForm.condition" type="text" class="input">
                <div v-if="carForm.errors.condition">{{ carForm.errors.condition }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Transmission</label>
                <input v-model="carForm.transmission" type="text" class="input">
                <div v-if="carForm.errors.transmission">{{ carForm.errors.transmission }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Drive Type</label>
                <input v-model="carForm.drive_type" type="text" class="input">
                <div v-if="carForm.errors.drive_type">{{ carForm.errors.drive_type }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Year</label>
                <input v-model="carForm.year" type="text">
                <div v-if="carForm.errors.year">{{ carForm.errors.year }}</div>
            </div>
            <div class="mx-12">
                <label class="label">MPG</label>
                <input v-model="carForm.mpg" type="text">
                <div v-if="carForm.errors.mpg">{{ carForm.errors.mpg }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Mi.</label>
                <input v-model="carForm.miles" type="text">
                <div v-if="carForm.errors.miles">{{ carForm.errors.miles }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Price</label>
                <input v-model="carForm.price" type="text">
                <div v-if="carForm.errors.price">{{ carForm.errors.price }}</div>
            </div>
            <div class="col-span-2 justify-self-center">
                <button type="submit" class="rounded-full bg-amber-600 py-3 px-12 mt-10 mb-2 font-semibold">Sell!
                </button>
            </div>
        </div>
    </form>
</template>

<script setup lang="ts">
import { Car } from "@/resources/types/car";
import { InertiaForm, useForm } from "@inertiajs/vue3"

const carForm: InertiaForm<Car> = useForm<Car>({
    make: "",
    model: "",
    condition: "",
    transmission: "",
    drive_type: "",
    year: 0,
    mpg: 0,
    miles: 0,
    price: 0,
    pictures: []
})

const createCar: () => void = () => carForm.post("/car")
</script>