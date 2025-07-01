<template>
    <div class="grid grid-cols-3 mx-12 my-5">
        <div class="col-span-2">
            <div v-for="notification in notifications" :key="notification.id">
                <!-- <OfferCard :offer="offer" :is-sold="car.sold_at !== null"></OfferCard> -->
            </div>
        </div>

    </div>
</template>

<script setup lang="ts">
import type { Notification } from "@/resources/types/notification"


const props = defineProps<{
    notifications: { data: Notification[] }
}>()

console.log(props.notifications.data)
</script>