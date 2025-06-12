<template>
    <form @submit.prevent="createUser">
        <div class="w-1/2 mx-auto border border-black mt-10 rounded bg-blue-300">
            <div class="flex justify-center">
                <div class="mt-10">
                    <label class="w-full font-semibold">Email</label>
                    <input v-model="newUserForm.email" class="w-full shadow-lg mt-1 rounded" type="text">
                    <div v-if="newUserForm.errors.email">{{ newUserForm.errors.email }}</div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="mt-5">
                    <label class="w-full font-semibold">Password</label>
                    <input v-model="newUserForm.password" class="w-full shadow-lg mt-1 rounded" type="password">
                    <div v-if="newUserForm.errors.email">{{ newUserForm.errors.password }}</div>
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
import { InertiaForm, useForm } from '@inertiajs/vue3';
type newUser = {
    name: string
    email: string,
    password: string
    password_conformation: string
}

const newUserForm: InertiaForm<newUser> = useForm<newUser>({
    name: "",
    email: "",
    password: "",
    password_conformation: ""

})

const createUser: () => void = () => newUserForm.post("")
</script>