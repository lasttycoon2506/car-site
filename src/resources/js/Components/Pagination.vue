<template>
    <Link v-for="(link, index) in links" :key="index" :href="link.url ?? ''"
        class="py-1 px-4 rounded-full font-semibold" :class="{ 'bg-rose-300': link.active }" v-html="link.label">
    </Link>
</template>

<script setup lang="ts">
import type { Link as LinkType } from '@/resources/types/link';
import { Link } from "@inertiajs/vue3"


defineProps<{ links: LinkType[] }>()

</script>