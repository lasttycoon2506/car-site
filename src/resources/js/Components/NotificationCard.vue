<template>
    <!-- created_at: string;
    data: {
    car_id: number;
    bidder_id: number;
    offer_id: number;
    amount: number; -->

    <div class="outline rounded-md py-3 my-3">{{ notification.data.amount }} for {{ notification.data.car_id }}</div>
</template>

<script setup lang="ts">
import type { Notification } from "@/resources/types/notification"


defineProps<{
    notification: Notification
}>()
</script>