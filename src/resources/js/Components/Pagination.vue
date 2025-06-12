<template>
    <Link v-for="(link, index) in links" :key="index" :href="link.url" class="py-2 py-x rounded"
        :class="{ 'bg-rose-300': link.active }">
    {{ link.label }}
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@/resources/types/link';

defineProps<{ links: Link[] }>()

</script>