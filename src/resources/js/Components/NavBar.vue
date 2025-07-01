<template>
    <header class="items-center rounded-lg border-b bg-slate-600">
        <div class="flex justify-between">
            <div class="flex items-center">
                <Link href="/cars">
                <div class="h-16 w-16 bg-cover bg-center rounded-[2vw] bg-[url('/mustang.jpg')] px-10 me-3 my-1 ms-1">
                </div>
                </Link>
                <div class="font-bold shadow-white text-3xl text-red-600 ms-2 me-12">
                    <Link href="/cars"> Carzies
                    </Link>
                </div>
                <div v-if="user" class="text-white font-semibold ms-12">
                    <Link href="/seller/cars">Your Cars
                    </Link>
                </div>
            </div>
            <div v-if="user" class="flex justify-end items-center gap-6">
                <div>🔔
                    <div>{{ user.notificationCount }}</div>
                </div>
                <div class="text-md text-rose-600">{{ user.email }}</div>
                <Link href="/seller/cars/create"> <button
                    class="rounded-lg bg-lime-500 py-2 px-10 font-semibold">Sell</button>
                </Link>
                <Link href="/logout" method="delete"> <button
                    class="rounded-lg bg-red-700 py-2 px-6 font-semibold me-6">Logout</button>
                </Link>
            </div>
            <div v-else class="flex items-center me-10 gap-7">
                <Link href="/login"> <button class="rounded-lg bg-lime-500 py-2 px-10 font-semibold">Login</button>
                </Link>
                <Link href="/user/create"> <button class="rounded-lg bg-orange-700 py-2 px-7 font-semibold">
                    Join Us!</button>
                </Link>
            </div>
        </div>

    </header>
</template>

<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import type { User } from "@/resources/types/user"
import { computed, ComputedRef } from 'vue';
import type { PageProps } from "@/resources/types/pageProps"


const page = usePage<PageProps>()

const user: ComputedRef<User | undefined> = computed(() => page.props.user)
const notificationCount: ComputedRef<number | null> = computed(() =>
    page.props.user ? page.props.user.notificationCount : null
)
</script>