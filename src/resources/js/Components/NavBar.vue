<template>
    <header class="items-center rounded-lg border-b bg-slate-600">
        <div class="flex justify-start items-center">
            <Link href="/car">
            <div class="h-16 w-16 bg-cover bg-center rounded-[2vw] bg-[url('/mustang.jpg')] px-10 me-3 my-1 ms-1">
            </div>
            </Link>
            <div class="shadow-xl font-bold shadow-white text-xl text-red-600">
                <Link href="/car" class="bg-slate-600"> Carzies
                </Link>
            </div>
        </div>
        <div class="flex justify-end">
            <Link href="/car/create"> <button class="rounded-full bg-slate-200 py-1 px-1">Sell</button>
            </Link>
        </div>
    </header>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

</script>