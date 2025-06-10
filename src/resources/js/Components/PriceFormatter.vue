<template>
    <span class="text-red-500">{{ formattedPrice }}</span>
</template>

<script setup lang="ts">
import { computed, ComputedRef } from 'vue';

const props = defineProps<{ price: number }>()

const formattedPrice: ComputedRef<string> = computed(() => props.price.toLocaleString("en-US",
    {
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 0
    }))

</script>