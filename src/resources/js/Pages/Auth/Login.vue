<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto border border-black mt-10 rounded bg-blue-300">
            <div class="flex justify-center">
                <div class="mt-10">
                    <label class="w-full font-semibold">Username</label>
                    <input v-model="loginForm.username" class="w-full shadow-lg mt-1 rounded" type="text">
                </div>
            </div>
            <div class="flex justify-center">
                <div class="mt-5">
                    <label class="w-full font-semibold">Password</label>
                    <input v-model="loginForm.password" class="w-full shadow-lg mt-1 rounded" type="password">
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="rounded-full bg-amber-600 py-3 px-12 mt-10 mb-5 font-semibold">Login
                </button>
            </div>
        </div>
    </form>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
type credentials = {
    username: string, password: string
}

const loginForm = useForm<credentials>({
    username: "",
    password: ""
})

const login = () => loginForm.post("login/store")
</script>