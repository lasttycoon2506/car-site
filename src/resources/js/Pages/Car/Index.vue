<template>
    <div v-if="page.props[0].flash.success">{{ page.props[0].flash.success }}</div>
    <div v-for="car in cars" :key="car.id">
        <Link :href="`/car/${car.id}`">
        {{ car.make }}
        </Link>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3"

const page = usePage()
defineProps({ cars: Array })
</script>