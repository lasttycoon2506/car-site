<template>
    <div v-if="createSuccessMsg">{{ createSuccessMsg }}</div>
    <div v-for="car in cars" :key="car.id">
        <Link :href="`/car/${car.id}`">
        {{ car.make }}
        </Link>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3"
import { computed } from "vue"

const page = usePage()
const createSuccessMsg = computed(() => page.props[0].flash.success)
defineProps({ cars: Array })
</script>