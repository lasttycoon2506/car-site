<template>
    <div class="flex border-b mb-4 gap-10">
        <button v-for="tab in tabs" :key="tab" @click="activeTab = tab" :class="[
            'px-4 py-2 font-semibold focus:outline-none',
            activeTab === tab ? 'border-b-2 border-t-2 border-s-2 border-e-2 rounded-md border-lime-500 text-lime-600' : 'text-gray-500'
        ]">
            {{ tab }}
        </button>
    </div>
    <div v-if="activeTab === 'Unread'">
        <slot name="unreadNotifications" />
    </div>
    <div v-else-if="activeTab === 'Read'">
        <slot name="readNotifications" />
    </div>
    <div v-else-if="activeTab === 'All'">
        <slot name="allNotifications" />
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const tabs = ['Unread', 'Read', "All"]
const activeTab = ref(tabs[0])
</script>