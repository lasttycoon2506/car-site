<template>
    <div v-if="createSuccessMsg">{{ createSuccessMsg }}</div>
    <div v-for="car in cars" :key="car.id">
        <div>
            <Link :href="`/car/${car.id}`">
            {{ car.make }}, {{ car.model }}, {{ car.year }}, {{ car.condition }}, {{ car.drive_type }}, {{ car.miles }},
            {{ car.mpg }}, {{ car.price }}, {{ car.transmission }}
            </Link>
        </div>
        <div>
            <Link :href="`/car/${car.id}/edit`">
            Edit
            </Link>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ComputedRef } from "vue"
import type { Car } from "@/resources/types/car"
type PageProps = {
    0: { flash: { success: string } },
    cars: Car[],
    errors: {}
}

const page = usePage<PageProps>()

const createSuccessMsg: ComputedRef<string> = computed(() => page.props[0].flash?.success)
defineProps<{ cars: Car[] }>()
</script>