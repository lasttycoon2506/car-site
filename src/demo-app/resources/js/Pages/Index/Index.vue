<template>
    <div>index</div>
    {{ message }}
    <Link href="/show">show me</Link>
</template>

<script setup>
    import {Link} from "@inertiajs/vue3"

    defineProps(["message"])
</script>