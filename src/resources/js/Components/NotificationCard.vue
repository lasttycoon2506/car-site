<template>
    <div class="grid grid-cols-4 outline rounded-md py-3 my-3">
        <div class="col-span-2 flex justify-center">
            <PriceFormatter :price="notification.data.amount" :allow-negative="false" class="font-semibold">
            </PriceFormatter>
            &nbsp; for {{ notification.data.car_make.toUpperCase() }}
            {{ notification.data.car_model.charAt(0).toUpperCase() + notification.data.car_model.slice(1) }}
            on &nbsp;<span class="font-semibold">{{ notifCreatedAt }}</span>
        </div>
        <div>
            <Link :href="`/cars/${notification.data.car_id}`"
                class="rounded-lg bg-amber-400 py-2 px-5 font-semibold hover:bg-amber-800">
            See Car
            </Link>
        </div>
        <div>
            <Link :href="`/seller/cars/${notification.data.car_id}`"
                class="rounded-lg bg-lime-600 py-2 px-4 font-semibold hover:bg-amber-800">
            See Offer
            </Link>
            <Link :href="`/notification/${notification.id}/read`" method="put"
                class="rounded-lg bg-lime-600 py-2 px-4 font-semibold hover:bg-amber-800">
            Mark as Read
            </Link>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Notification } from "@/resources/types/notification"
import { computed, ComputedRef } from "vue";
import PriceFormatter from "./PriceFormatter.vue";
import { Link } from "@inertiajs/vue3";


const props = defineProps<{
    notification: Notification
}>()

const notifCreatedAt: ComputedRef<string> = computed(() => new Date(props.notification.created_at).toLocaleDateString())
</script>