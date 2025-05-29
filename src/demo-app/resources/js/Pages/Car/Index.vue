<template>
    <div v-for="car in cars" :key="car.id">
        <Link :href="`/car/${car.id}`">
        {{ car.make }}
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"

defineProps({ cars: Array })
</script>