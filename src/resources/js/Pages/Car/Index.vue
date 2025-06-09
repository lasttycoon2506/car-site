<template>
    <NavBar></NavBar>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 px-10">
        <div v-for="car in cars" :key="car.id">
            <CarCard>
                <div>
                    <img :src="`${car.pictures[0]}`">
                    <Link :href="`/car/${car.id}`">
                    {{ car.make }}, {{ car.model }}, {{ car.year }}, {{ car.condition }}, {{ car.drive_type }}, {{
                        car.miles
                    }},
                    {{ car.mpg }}, {{ car.price }}, {{ car.transmission }}
                    </Link>
                </div>
                <div>
                    <Link :href="`/car/${car.id}/edit`">
                    Edit
                    </Link>
                </div>
                <div>
                    <Link :href="`/car/${car.id}`" method="delete">
                    Delete
                    </Link>
                </div>
                <div>{{ car.pictures }}</div>
            </CarCard>
        </div>
    </div>
</template>

<script setup lang="ts">
import NavBar from "../../Components/NavBar.vue"
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ComputedRef } from "vue"
import type { Car } from "@/resources/types/car"
import Alert from "../../Components/Alert.vue"
import CarCard from "../../Components/CarCard.vue"
type PageProps = {
    0: { flash: { success: string } },
}
defineProps<{ cars: Car[] }>()

const page = usePage<PageProps>()

const alertMsg: ComputedRef<string> = computed(() => page.props[0].flash?.success)
</script>