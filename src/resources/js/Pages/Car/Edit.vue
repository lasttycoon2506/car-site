<template>
    <form @submit.prevent="editCar">
        <div>
            <label>Make</label>
            <input v-model="carForm.make" type="text">
            <div v-if="carForm.errors.make">{{ carForm.errors.make }}</div>
        </div>
        <div>
            <label>Model</label>
            <input v-model="carForm.model" type="text">
            <div v-if="carForm.errors.model">{{ carForm.errors.model }}</div>
        </div>
        <div>
            <label>Condition</label>
            <input v-model="carForm.condition" type="text">
            <div v-if="carForm.errors.condition">{{ carForm.errors.condition }}</div>
        </div>
        <div>
            <label>Transmission</label>
            <input v-model="carForm.transmission" type="text">
            <div v-if="carForm.errors.transmission">{{ carForm.errors.transmission }}</div>
        </div>
        <div>
            <label>Drive Type</label>
            <input v-model="carForm.drive_type" type="text">
            <div v-if="carForm.errors.drive_type">{{ carForm.errors.drive_type }}</div>
        </div>
        <div>
            <label>Year</label>
            <input v-model="carForm.year" type="text">
            <div v-if="carForm.errors.year">{{ carForm.errors.year }}</div>
        </div>
        <div>
            <label>MPG</label>
            <input v-model="carForm.mpg" type="text">
            <div v-if="carForm.errors.mpg">{{ carForm.errors.mpg }}</div>
        </div>
        <div>
            <label>Mi.</label>
            <input v-model="carForm.miles" type="text">
            <div v-if="carForm.errors.miles">{{ carForm.errors.miles }}</div>
        </div>
        <div>
            <label>Price</label>
            <input v-model="carForm.price" type="text">
            <div v-if="carForm.errors.price">{{ carForm.errors.price }}</div>
        </div>
        <div>
            <button type="submit">Edit </button>
        </div>
    </form>
</template>

<script setup lang="ts">
import { Car } from "@/resources/types/car";
import { InertiaForm, useForm } from "@inertiajs/vue3"

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

const editCar: () => void = () => carForm.put(`/car/${props.car.id}`)
</script>