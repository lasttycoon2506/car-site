<template>
    <h1 class="flex text-shadow-lg font-bold justify-center text-4xl mt-5">Join Us!</h1>
    <form @submit.prevent="createUser">
        <div class="w-1/2 mx-auto border border-black mt-5 rounded bg-blue-300">
            <div class="w-1/2 mx-auto">
                <div class="mt-10">
                    <label class="font-semibold">Name</label>
                    <input v-model="newUserForm.name" class="w-full shadow-lg mt-1 rounded" type="text">
                    <div v-if="newUserForm.errors.name" class="input-error">{{ newUserForm.errors.name }}</div>
                </div>
                <div class="mt-5">
                    <label class="font-semibold">Email</label>
                    <input v-model="newUserForm.email" class="w-full shadow-lg mt-1 rounded" type="text">
                    <div v-if="newUserForm.errors.email" class="input-error">{{ newUserForm.errors.email }}</div>
                </div>
                <div class="mt-5">
                    <label class="font-semibold">Password</label>
                    <input v-model="newUserForm.password" class="w-full shadow-lg mt-1 rounded" type="password">
                    <div v-if="newUserForm.errors.password" class="input-error">{{ newUserForm.errors.password }}</div>
                </div>
                <div class="mt-5">
                    <label class="font-semibold">Confirm Password</label>
                    <input v-model="newUserForm.password_confirmation" class="w-full shadow-lg mt-1 rounded"
                        type="password">
                    <div v-if="newUserForm.errors.password_confirmation" class="input-error">{{
                        newUserForm.errors.password_confirmation }}
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="rounded-full bg-amber-600 py-3 px-12 mt-10 mb-5 font-semibold">Join
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
    password_confirmation: string
}

const newUserForm: InertiaForm<newUser> = useForm<newUser>({
    name: "",
    email: "",
    password: "",
    password_confirmation: ""

})

const createUser: () => void = () => newUserForm.post("/user")
</script>