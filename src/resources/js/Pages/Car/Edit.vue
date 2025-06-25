<template>
    <h1 class="flex text-shadow-lg font-bold justify-center text-4xl mt-5">Change your Car!</h1>
    <form @submit.prevent="editCar">
        <div class="grid grid-cols-2 mx-12 my-5 bg-slate-400 rounded-lg py-5 px-12">
            <div class="mx-12">
                <label class="label">Make</label>
                <input v-model="carForm.make" type="text" class="input">
                <div v-if="carForm.errors.make" class="input-error">{{ carForm.errors.make }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Model</label>
                <input v-model="carForm.model" type="text" class="input">
                <div v-if="carForm.errors.model" class="input-error">{{ carForm.errors.model }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Condition</label>
                <input v-model="carForm.condition" type="text" class="input">
                <div v-if="carForm.errors.condition" class="input-error">{{ carForm.errors.condition }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Transmission</label>
                <input v-model="carForm.transmission" type="text" class="input">
                <div v-if="carForm.errors.transmission" class="input-error">{{ carForm.errors.transmission }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Drive Type</label>
                <input v-model="carForm.drive_type" type="text" class="input">
                <div v-if="carForm.errors.drive_type" class="input-error">{{ carForm.errors.drive_type }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Year</label>
                <input v-model="carForm.year" type="text">
                <div v-if="carForm.errors.year" class="input-error">{{ carForm.errors.year }}</div>
            </div>
            <div class="mx-12">
                <label class="label">MPG</label>
                <input v-model="carForm.mpg" type="text">
                <div v-if="carForm.errors.mpg" class="input-error">{{ carForm.errors.mpg }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Mi.</label>
                <input v-model="carForm.miles" type="text">
                <div v-if="carForm.errors.miles" class="input-error">{{ carForm.errors.miles }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Price</label>
                <input v-model="carForm.price" type="text">
                <div v-if="carForm.errors.price" class="input-error">{{ carForm.errors.price }}</div>
            </div>
            <div class="w-1/4 mx-12 bg-slate-50 rounded-md mt-5 text-center self-center font-medium py-2">
                <Link :href="`/seller/car/${car.id}/image/create`">Pictures
                </Link>
            </div>
            <div class="col-span-2 justify-self-center">
                <button type="submit" class="rounded-full bg-lime-500 py-3 px-12 mt-10 mb-2 font-semibold">Update!
                </button>
            </div>
        </div>
    </form>
</template>

<script setup lang="ts">
import { Car } from "@/resources/types/car";
import { InertiaForm, Link, useForm } from "@inertiajs/vue3"

const props = defineProps<{ car: Car }>()
const carForm: InertiaForm<Car> = useForm<Car>({
    make: props.car.make,
    model: props.car.model,
    condition: props.car.condition,
    transmission: props.car.transmission,
    drive_type: props.car.drive_type,
    year: props.car.year,
    mpg: props.car.mpg,
    miles: props.car.miles,
    price: props.car.price
})

const editCar: () => void = () => carForm.put(`/seller/cars/${props.car.id}`)
</script>