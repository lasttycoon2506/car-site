<template>
    <div class="bg-green-300 rounded-lg border border-green-400 shadow-lg ps-5">{{ success }}</div>
</template>

<script setup lang="ts">
defineProps<{ success: string }>()

</script>