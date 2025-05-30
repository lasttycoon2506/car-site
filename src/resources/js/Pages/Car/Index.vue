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
import type { PageProps } from "@/resources/types/pageProps"
import type { Car } from "@/resources/types/car"

const page = usePage<PageProps>()
const createSuccessMsg: ComputedRef<string> = computed(() => page.props.flash?.success)

defineProps<{ cars: Car[] }>()
</script>