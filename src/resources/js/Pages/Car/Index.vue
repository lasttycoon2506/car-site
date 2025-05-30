<template>
    <div v-if="createSuccessMsg">{{ createSuccessMsg }}</div>
    <div v-for="car in cars" :key="car.id">
        <Link :href="`/car/${car.id}`">
        {{ car.make }}
        </Link>
    </div>
</template>

<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3"
import { computed, ComputedRef } from "vue"
import type { PageProps } from "../../../types/pageProps"

const page = usePage<PageProps>()
const createSuccessMsg: ComputedRef<string | undefined> = computed(() => page.props.flash.success)
defineProps({ cars: Array })
</script>