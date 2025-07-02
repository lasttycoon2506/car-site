<template>
    <div class="flex border-b mb-4 gap-10">
        <button v-for="tab in tabs" :key="tab"
            :class="['px-4 py-2', props.activeTab === tab ? 'font-bold border-b-2 border-s-2 border-e-2 border-t-2 rounded-lg border-lime-500' : 'text-gray-500']"
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
const tabs = ['Unread', 'Read', "All"]

const props = defineProps<{
    activeTab: string
}>()
const emit: __VLS_Emit = defineEmits<{
    (e: 'update:activeTab', value: string): void
}>()

const setTab: (tab: string) => void
    = (tab: string) => {
        emit('update:activeTab', tab)
    }
</script>