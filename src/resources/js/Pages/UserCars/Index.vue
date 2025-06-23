<template>
    <div v-for="car in userCars">
        {{ car }}
    </div>
</template>

<script setup lang="ts">
import { Car } from '@/resources/types/car';

defineProps<{ userCars: Car[] }>()

</script>