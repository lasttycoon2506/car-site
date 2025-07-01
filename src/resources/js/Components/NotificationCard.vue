<template>
    <div class="outline rounded-md py-3 my-3">
        <PriceFormatter :price="notification.data.amount" :allow-negative="false" class="font-semibold">
        </PriceFormatter>
        for {{ notification.data.car_make }} {{ notification.data.car_model }}
        on {{ notifCreatedAt }}
        <Link :href="`/cars/${notification.data.car_id}`"
            class="rounded-lg bg-amber-400 py-2 px-3 font-semibold hover:bg-amber-800">
        See Car
        </Link>
        <Link :href="`/seller/cars/${notification.data.car_id}`"
            class="rounded-lg bg-amber-400 py-2 px-3 font-semibold hover:bg-amber-800">
        See Offer
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