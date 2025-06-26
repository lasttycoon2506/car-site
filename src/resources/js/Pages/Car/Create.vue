<template>
    <h1 class="text-shadow-lg font-bold text-center text-4xl mt-5">Sell Your Car!</h1>
    <form @submit.prevent="createCar">
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
                <select v-model="carForm.condition" class="w-1/2">
                    <option value="" disabled selected>Select</option>
                    <option value="Ok">Ok</option>
                    <option value="Good">Good</option>
                    <option value="Great">Great</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Like New">Like New</option>
                </select>
                <div v-if="carForm.errors.condition" class="input-error">{{ carForm.errors.condition }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Transmission</label>
                <select v-model="carForm.transmission" class="w-1/2">
                    <option value="" disabled selected> Select</option>
                    <option value="automatic">Automatic</option>
                    <option value="manual">Manual</option>
                </select>
                <div v-if="carForm.errors.transmission" class="input-error">{{ carForm.errors.transmission }}</div>
            </div>
            <div class="mx-12">
                <label class="label">Drive Type</label>
                <select v-model="carForm.drive_type" class="w-1/2">
                    <option value="" disabled selected>Select</option>
                    <option value="FWD">FWD</option>
                    <option value="RWD">RWD</option>
                    <option value="AWD">AWD</option>
                    <option value="4WD">4WD</option>
                </select>
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
            <!-- <div class="w-1/4 mx-12 bg-slate-50 rounded-md mt-5 text-center self-center font-medium py-2">
                <Link :href="`/seller/car/${car.id}/image/create`">Pictures ({{ car.images.length }})
                </Link>
            </div> -->
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
    images: []
})

const createCar: () => void = () => carForm.post("/car")


</script>
