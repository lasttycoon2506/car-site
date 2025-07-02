<template>
    <div v-if="allowNegative">
        <span v-if="price < 0" class="text-red-500">{{ formattedPrice }}</span>
        <span v-else class="text-black">{{ formattedPrice }}</span>
    </div>
    <span v-else class="text-red-500">{{ formattedPrice }}</span>
</template>

<script setup lang="ts">
import { computed, ComputedRef } from 'vue';


const props = defineProps<{ price: number, allowNegative: boolean }>()

const formattedPrice: ComputedRef<string> = computed(() => props.price.toLocaleString("en-US",
    {
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 0
    }))
</script>