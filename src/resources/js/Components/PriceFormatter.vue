<template>
    <span class="text-red-500">{{ formattedPrice }}</span>
</template>

<script setup lang="ts">
const props = defineProps<{ price: number }>()

const formattedPrice: string = props.price.toLocaleString("en-US", { style: "currency", currency: "USD", maximumFractionDigits: 0 })

</script>