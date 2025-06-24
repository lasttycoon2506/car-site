<template>
    <form method="post" :action="`/seller/car/${car.id}/image`">
        <input type="file" name="files" multiple>
        <button type="submit">submit</button>
    </form>
</template>

<script setup lang="ts">
import { Car } from '@/resources/types/car';

defineProps<{ car: Car }>()
</script>