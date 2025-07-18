<template>
    <div class="mx-12 my-5">
        <h1 class="text-shadow-lg font-bold text-center text-4xl mt-5 mb-12">Your Notifications</h1>
        <Tabs v-model:activeTab="activeTab">
            <template #unreadNotifications>
                <div v-for="notification in unreadNotifications.data" :key="notification.id">
                    <NotificationCard :notification="notification" />
                </div>
            </template>
            <template #readNotifications>
                <div v-for="notification in readNotifications.data" :key="notification.id">
                    <NotificationCard :notification="notification" />
                </div>
            </template>
            <template #allNotifications>
                <div v-for="notification in allNotifications.data" :key="notification.id">
                    <NotificationCard :notification="notification" />
                </div>
            </template>
        </Tabs>
        <div v-if="selectedNotifications!.total" class="flex flex-col items-center my-10">
            <div class="mb-3">
                <span class="font-semibold">{{ selectedNotifications!.total }}</span> notifications
            </div>
            <div>
                <Pagination :links="selectedNotifications!.links" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Notification } from "@/resources/types/notification"
import NotificationCard from "../../Components/NotificationCard.vue";
import { computed, ComputedRef, Ref, ref, watch } from "vue";
import Pagination from "../../Components/Pagination.vue";
import type { Link } from "@/resources/types/link";
import Tabs from "../../Components/Tabs.vue";
import { router } from "@inertiajs/vue3";


const props = defineProps<{
    allNotifications: { data: Notification[], links: Link[], total: number }
    unreadNotifications: { data: Notification[], links: Link[], total: number },
    readNotifications: { data: Notification[], links: Link[], total: number }
}>()
const activeTab: Ref<string, string> = ref(new URLSearchParams(window.location.search).get('tab') || "Unread")

watch(activeTab, (newTab: string) => {
    router.get(
        "/notifications",
        { tab: newTab },
        { preserveState: true, replace: true, preserveScroll: true }
    )
})

const selectedNotifications: ComputedRef<{
    data: Notification[];
    links: Link[];
    total: number;
} | undefined> =
    computed(() => {
        if (activeTab.value === "Read") return props.readNotifications
        else if (activeTab.value === "All") return props.allNotifications
        else if (activeTab.value === "Unread") return props.unreadNotifications
    })
</script>