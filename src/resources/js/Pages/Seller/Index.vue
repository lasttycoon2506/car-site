<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <h1 class="text-shadow-lg font-bold text-center text-4xl mt-5 mb-8">Your Cars</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-10 my-3">
        <div v-for="car in sellerCars.data">
            <div class="border border-grey-500 shadow-2xl rounded-lg px-3 py-3">
                <div class="flex justify-center">
                    <img v-if="car.images.length > 0" :src="`${car.images[0].file_url}`"
                        class="rounded-lg border border-black w-[300px] h-[150px]">
                    <div v-else
                        class="flex justify-center items-center rounded-lg border border-black w-[300px] h-[150px]">
                        Upload Image(s)!</div>
                </div>
                <div class="flex justify-between font-semibold mx-5 mt-3">
                    <div>{{ car.make }}</div>
                    <div>{{ car.model }}</div>
                </div>
                <div class="flex justify-between font-semibold mx-5 mb-3">
                    <div>{{ car.year }}</div>
                    <div>
                        <PriceFormatter :price="car.price" :allow-negative="false"></PriceFormatter>
                    </div>
                </div>
                <div class="flex justify-center gap-4">
                    <Link :href="`/seller/cars/${car.id}/edit`"
                        class="rounded-lg bg-lime-500 py-2 px-10 font-semibold hover:bg-lime-900">
                    Edit
                    </Link>
                    <Link :href="`/seller/cars/${car.id}`" method="delete"
                        class="rounded-lg bg-red-600 py-2 px-7 font-semibold hover:bg-red-900">
                    Delete
                    </Link>
                </div>
            </div>
        </div>
    </div>
    <div v-if="sellerCars.data.length" class="flex flex-col items-center my-10">
        <div class="mb-3">
            <span class="font-semibold">{{ sellerCars.total }}</span> cars
        </div>
        <div>
            <Pagination :links="sellerCars.links" />
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
import type { PageProps } from "@/resources/types/pageProps"


defineProps<{ sellerCars: Cars }>()
const page = usePage<PageProps>()

const alertMsg: ComputedRef<string | undefined> = computed(() => page.props.flash?.success)
</script>