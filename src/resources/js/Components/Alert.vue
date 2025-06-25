<template>
    <div class="bg-green-300 rounded-lg border-green-300 shadow-lg ps-5 py-1">{{
        success
    }}</div>
</template>

<script setup lang="ts">
defineProps<{
    success: string,
}>()
</script>