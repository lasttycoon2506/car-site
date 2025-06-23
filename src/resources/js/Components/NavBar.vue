<template>
    <header class="items-center rounded-lg border-b bg-slate-600">
        <div class="flex justify-between">
            <div class="flex items-center">
                <Link href="/car">
                <div class="h-16 w-16 bg-cover bg-center rounded-[2vw] bg-[url('/mustang.jpg')] px-10 me-3 my-1 ms-1">
                </div>
                </Link>
                <div class="font-bold shadow-white text-3xl text-red-600 me-12">
                    <Link href="/car"> Carzies
                    </Link>
                </div>
                <div class="text-white font-semibold ms-12">
                    <Link href="">Your Cars
                    </Link>
                </div>
            </div>
            <div v-if="user" class="flex justify-end items-center gap-6">
                <div class="text-md text-rose-600">{{ user.email }}</div>
                <Link href="/car/create"> <button class="rounded-lg bg-lime-500 py-2 px-6 font-bold">Sell</button>
                </Link>
                <Link href="/logout" method="delete"> <button
                    class="rounded-lg bg-red-700 py-2 px-6 font-bold me-6">Logout</button>
                </Link>
            </div>
            <div v-else class="flex items-center me-10 gap-7">
                <Link href="/login"> <button class="rounded-lg bg-lime-500 py-2 px-10 font-bold">Login</button>
                </Link>
                <Link href="/user/create"> <button class="rounded-lg bg-orange-700 py-2 px-5 font-bold">
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

type PageProps = {
    user: User
}
const page = usePage<PageProps>()

const user: ComputedRef<User> = computed(() => page.props.user)
</script>