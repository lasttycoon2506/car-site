<template>
    <div class="mx-12 my-5">
        <h1 class="text-shadow-lg font-bold text-center text-4xl mt-5 mb-12">Your Notifications</h1>
        <Tabs>
            <template #unreadNotifications>
                <div v-for="notification in notifications.data" :key="notification.id">
                    <NotificationCard :notification="notification" />
                </div>
            </template>
            <template #readNotifications>
                <!-- Your offers list or component -->
            </template>
        </Tabs>
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
import Pagination from "../../Components/Pagination.vue";
import type { Link } from "@/resources/types/link";
import Tabs from "../../Components/Tabs.vue";


const page = usePage<PageProps>()
const props = defineProps<{
    notifications: { data: Notification[], links: Link[] }
}>()

const notificationCount: ComputedRef<number> = computed(() =>
    page.props.user!.notificationCount
)
const unreadNotifications: ComputedRef<Notification[]> = computed(() => (
    props.notifications.data.filter(element => !element.read_at)))
</script>