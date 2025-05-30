<template>
    <div>
        {{ car.make }} {{ car.model }} {{ car.year }}
    </div>
</template>

<script setup lang="ts">
import type { Car } from '@/resources/types/car';

defineProps<{ car: Car }>()
</script>