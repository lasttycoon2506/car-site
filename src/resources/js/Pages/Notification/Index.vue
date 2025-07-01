<template>
    <div class="mx-12 my-5">
        <h1 class="text-shadow-lg font-bold text-center text-4xl mt-5 mb-12">Your Notifications</h1>
        <div v-for="notification in notifications.data" :key="notification.id">
            <NotificationCard :notification="notification" />
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Notification } from "@/resources/types/notification"
import NotificationCard from "../../Components/NotificationCard.vue";


defineProps<{
    notifications: { data: Notification[] }
}>()
</script>