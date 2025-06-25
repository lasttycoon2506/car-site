<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <h1 class="text-shadow-lg font-bold text-center text-4xl mt-5 mb-8">Your Cars</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-10 my-3">
        <div v-for="car in userCars.data">
            <div class="border border-grey-500 shadow-2xl rounded-lg px-3 py-3">
                <img :src="`${car.images[0].file_url}`" class="rounded-lg border border-black">
                <div class="flex justify-between font-semibold mx-5 mt-3">
                    <div>{{ car.make }}</div>
                    <div>{{ car.model }}</div>

                </div>
                <div class="flex justify-between font-semibold mx-5 mb-3">
                    <div>{{ car.year }}</div>
                    <div>
                        <PriceFormatter :price="car.price"></PriceFormatter>
                    </div>
                </div>
                <div class="flex justify-center gap-4">
                    <Link :href="`/seller/cars/${car.id}/edit`">
                    <button class="rounded-lg bg-lime-500 py-2 px-6 font-bold hover:bg-lime-900">Edit</button>
                    </Link>
                    <Link :href="`/seller/cars/${car.id}`" method="delete">
                    <button class="rounded-lg bg-red-600 py-2 px-6 font-bold hover:bg-red-900">Delete</button>
                    </Link>
                </div>
            </div>
        </div>
    </div>
    <div v-if="userCars.data.length" class="flex flex-col items-center my-10">
        <div class="mb-3">
            <span class="font-semibold">{{ userCars.total }}</span> cars
        </div>
        <div>
            <Pagination :links="userCars.links" />
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import PriceFormatter from '../../Components/PriceFormatter.vue';
import { Cars } from '@/resources/types/cars';
import Pagination from '../../Components/Pagination.vue';
import { computed, ComputedRef } from 'vue';
import Alert from '../../Components/Alert.vue';

type PageProps = {
    flash: { success: string },
}

defineProps<{ userCars: Cars }>()
const page = usePage<PageProps>()

const alertMsg: ComputedRef<string> = computed(() => page.props.flash?.success)
</script>