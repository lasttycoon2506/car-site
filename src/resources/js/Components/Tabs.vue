<template>
    <div class="flex border-b mb-4 gap-10">
        <button v-for="tab in tabs" :key="tab"
            :class="['px-4 py-2', props.activeTab === tab ? 'font-bold border-b-2 border-lime-500' : '']"
            @click="setTab(tab)">
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

const props = defineProps<{
    activeTab: string
}>()
const emit = defineEmits<{
    (e: 'update:activeTab', value: string): void
}>()

function setTab(tab: string) {
    emit('update:activeTab', tab)
}
</script>