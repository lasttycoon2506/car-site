<template>
    <div class="grid grid-cols-4 outline rounded-md py-3 my-3">
        <div class="col-span-2 flex justify-center">
            <PriceFormatter :price="notification.data.amount" :allow-negative="false" class="font-semibold">
            </PriceFormatter>
            &nbsp; for {{ notification.data.car_make }} {{ notification.data.car_model }}
            on {{ notifCreatedAt }}
        </div>
        <div>
            <Link :href="`/cars/${notification.data.car_id}`"
                class="rounded-lg bg-amber-400 py-2 px-5 font-semibold hover:bg-amber-800">
            See Car
            </Link>
        </div>
        <div>
            <Link :href="`/seller/cars/${notification.data.car_id}`"
                class="rounded-lg bg-amber-400 py-2 px-4 font-semibold hover:bg-amber-800">
            See Offer
            </Link>
        </div>
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