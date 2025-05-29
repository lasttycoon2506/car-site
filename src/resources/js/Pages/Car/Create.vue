<template>
    <form @submit="postCar">
        <div>
            <label>Make</label>
            <input v-model="carForm.make" type="text">
        </div>
        <div>
            <label>Model</label>
            <input v-model="carForm.model" type="text">
        </div>
        <div>
            <label>Condition</label>
            <input v-model="carForm.condition" type="text">
        </div>
        <div>
            <label>Transmission</label>
            <input v-model="carForm.transmission" type="text">
        </div>
        <div>
            <label>Drive Type</label>
            <input v-model="carForm.drive_type" type="text">
        </div>
        <div>
            <label>Year</label>
            <input v-model="carForm.year" type="text">
        </div>
        <div>
            <label>MPG</label>
            <input v-model="carForm.mpg" type="text">
        </div>
        <div>
            <label>Mi.</label>
            <input v-model="carForm.miles" type="text">
        </div>
        <div>
            <label>Price</label>
            <input v-model="carForm.price" type="text">
        </div>
        <div>
            <button type="submit">create </button>
        </div>
    </form>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/vue3"

const carForm = useForm({
    make: "", model: "", condition: "", transmission: "", drive_type: "", year: "",
    mpg: "", miles: "", price: ""
})

const postCar = () => carForm.post("/car")

</script>