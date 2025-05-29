<template>
    <div>
        {{ car.make }} {{ car.model }} {{ car.year }}
    </div>
</template>

<script setup>

defineProps({ car: Object })
</script>