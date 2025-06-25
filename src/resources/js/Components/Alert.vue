<template>
    <div v-if="success.match('car edited!')" class="bg-green-300 rounded-lg border-green-300 shadow-lg ps-5">{{ success
        }}</div>
    <div v-if="success.match('car deleted!')" class="bg-red-600 rounded-lg border border-black shadow-lg ps-5">{{
        success }}</div>
    <div v-if="success.match('image(s) uploaded!')" class="bg-green-300 rounded-lg border-green-300 shadow-lg ps-5">{{
        success
        }}</div>
</template>

<script setup lang="ts">
defineProps<{
    success: string,
}>()
</script>