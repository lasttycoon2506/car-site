<template>
    <header class="items-center rounded-lg border-b bg-slate-600">
        <div class="flex justify-between">
            <div class="flex items-center">
                <Link href="/car">
                <div class="h-16 w-16 bg-cover bg-center rounded-[2vw] bg-[url('/mustang.jpg')] px-10 me-3 my-1 ms-1">
                </div>
                </Link>
                <div class="shadow-xl font-bold shadow-white text-xl text-red-600">
                    <Link href="/car" class="bg-slate-600"> Carzies
                    </Link>
                </div>
            </div>
            <div v-if="user" class="flex justify-end items-center gap-4">
                <div class=" text-lg text-rose-600">{{ user.email }}</div>
                <Link href="/car/create"> <button class="rounded-lg bg-lime-500 py-2 px-6 font-bold">Sell</button>
                </Link>
                <Link href="/login"> <button class="rounded-lg bg-lime-500 py-2 px-6 font-bold me-4">Logout</button>
                </Link>
            </div>
            <div v-else>
                <Link href="/login"> <button class="rounded-lg bg-lime-500 py-2 px-6 font-bold">Login</button>
                </Link>
            </div>
        </div>

    </header>
</template>

<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import type { User } from "@/resources/types/user"
import { computed, ComputedRef } from 'vue';
type PageProps = {
    user: User
}

const page = usePage<PageProps>()

const user: ComputedRef<User> = computed(() => page.props.user)
</script>