<template>
    <div class="outline rounded-md py-3 my-3">
        <PriceFormatter :price="notification.data.amount" :allow-negative="false" class="font-semibold">
        </PriceFormatter>
        for {{ notification.data.car_make }} {{ notification.data.car_model }}
        on {{ notifCreatedAt }}
        <Link :href="`/cars/${notification.data.car_id}`">
        Listing
        </Link>
    </div>
</template>

<script setup lang="ts">
import type { Notification } from "@/resources/types/notification"
import { computed } from "vue";
import PriceFormatter from "./PriceFormatter.vue";
import { Link } from "@inertiajs/vue3";


const props = defineProps<{
    notification: Notification
}>()

const notifCreatedAt = computed(() => new Date(props.notification.created_at).toLocaleDateString())
</script>