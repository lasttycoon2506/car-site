<template>
    <div>
        <!-- Tab headers -->
        <div class="flex border-b mb-4">
            <button v-for="tab in tabs" :key="tab" @click="activeTab = tab" :class="[
                'px-4 py-2 font-semibold focus:outline-none',
                activeTab === tab ? 'border-b-2 border-lime-500 text-lime-600' : 'text-gray-500'
            ]">
                {{ tab }}
            </button>
        </div>

        <!-- Tab content -->
        <div v-if="activeTab === 'UnreadNotifications'">
            <!-- Place your notifications content here -->
            <slot name="unreadNotifications" />
        </div>
        <div v-else-if="activeTab === 'ReadNotifications'">
            <!-- Place your offers content here -->
            <slot name="readNotifications" />
        </div>
        <div v-else>
            <!-- Default or other tab content -->
            <slot />
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const tabs = ['UnreadNotifications', 'ReadNotifications']
const activeTab = ref(tabs[0])
</script>