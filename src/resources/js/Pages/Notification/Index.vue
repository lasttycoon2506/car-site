<template>
    <div class="mx-12 my-5">
        <h1 class="text-shadow-lg font-bold text-center text-4xl mt-5 mb-12">Your Notifications</h1>
        <div v-for="notification in notifications.data" :key="notification.id">
            <NotificationCard :notification="notification" />
        </div>
        <div v-if="notificationCount > 0" class="flex flex-col items-center my-10">
            <div class="mb-3">
                <span class="font-semibold">{{ notificationCount }}</span> notifications
            </div>
            <div>
                <Pagination :links="notifications.links" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Notification } from "@/resources/types/notification"
import NotificationCard from "../../Components/NotificationCard.vue";
import { usePage } from "@inertiajs/vue3";
import type { PageProps } from "@/resources/types/pageProps";
import { computed, ComputedRef } from "vue";
import type { User } from "@/resources/types/user";
import Pagination from "../../Components/Pagination.vue";


const page = usePage<PageProps>()
const props = defineProps<{
    notifications: { data: Notification[] }
}>()

console.log(props.notifications)

const user: ComputedRef<User | undefined> = computed(() => page.props.user)
const notificationCount: ComputedRef<number> = computed(() =>
    page.props.user!.notificationCount
)
</script>