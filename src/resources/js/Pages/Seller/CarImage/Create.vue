<template>
    <form method="post" :action="`/seller/car/${car.id}/image`">
        <input type="file" name="files" multiple :value="csrf">
        <button type="submit">submit</button>
    </form>
</template>

<script setup lang="ts">
import { Car } from '@/resources/types/car';

const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
defineProps<{ car: Car }>()
</script>