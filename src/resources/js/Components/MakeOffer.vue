<template>
    <form>
        <input v-model.number="props.price" type="text">
        <input v-model.number="props.price" type="range" min=".1" max="25" step=".1" class="cursor-pointer">
    </form>
</template>

<script setup lang="ts">

const props = defineProps<{
    carId: number,
    price: number,
}>()



</script>