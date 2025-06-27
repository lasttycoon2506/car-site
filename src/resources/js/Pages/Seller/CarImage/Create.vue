<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <div v-if="uploading" class="text-center mt-4 font-semibold">
        <span>Uploading image(s), please wait...</span>
    </div>
    <div class="border border-gray-400 w-3/4 mt-10 ms-10 rounded-md py-5 px-5">
        <form @submit.prevent="uploadImages">
            <div v-if="errorMsg.length" class="text-red-500 mb-4 text-lg font-semibold">{{ errorMsg[0] }}</div>
            <header class=" text-gray-600 mb-2">Upload Pictures</header>
            <input type="hidden" name="_token" :value="csrf" />
            <div class="flex justify-between items-center">
                <div class="w-3/5">
                    <input type="file" ref="fileInput" multiple @input="addFiles"
                        class="file:border-0 file:py-2 file:px-3 file:me-3 rounded-md border border-gray-300 w-full">
                </div>
                <div>
                    <button type="submit" :disabled="!fileExists"
                        class=" bg-lime-500 disabled:opacity-30 rounded-lg py-3 px-10 me-10 font-semibold">upload</button>
                    <button type="reset" @click="reset"
                        class="bg-red-600 rounded-lg py-3 px-11 font-semibold">reset</button>
                </div>
            </div>
        </form>
    </div>
    <div class="border border-gray-400 rounded-lg mt-4 mx-10 my-10 py-5 px-5">
        <header class=" text-gray-600 mb-4">Uploaded Pictures</header>
        <div class="grid grid-cols-5 gap-5">
            <div v-for="image in car.images" :key="car.id" class="flex flex-col">
                <img :src="image.file_url" class="rounded-lg">
                <Link :href="`/seller/car/${car.id}/image/${image.id}`" method="delete"
                    class="outline rounded-md mt-2 text-center py-1 bg-red-500 font-semibold text-sm hover:bg-red-800">
                Delete
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Alert from '../../../Components/Alert.vue';
import { Car } from '@/resources/types/car';
import { InertiaForm, Link, useForm, usePage } from '@inertiajs/vue3';
import { computed, ComputedRef, Ref, ref } from 'vue';
import NProgress from 'nprogress'
import { AxiosProgressEvent } from 'axios';
import type { PageProps } from "@/resources/types/pageProps"


const uploading: Ref<boolean> = ref(false)
const fileInput: Ref<HTMLInputElement | null> = ref<HTMLInputElement | null>(null)
const csrf: string = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
const props = defineProps<{ car: Car, errors: any }>()
const imageForm: InertiaForm<{ images: File[]; }> =
    useForm<{ images: File[] }>({ images: [] })
const page = usePage<PageProps>()

const errorMsg: ComputedRef<string[]> = computed(() => Object.values(imageForm.errors))
const alertMsg: ComputedRef<string | undefined> = computed(() => page.props.flash?.success)
const fileExists: ComputedRef<boolean> = computed(() => imageForm.images.length > 0)

const uploadImages: () => void =
    () => {
        uploading.value = true
        imageForm.post(
            `/seller/car/${props.car.id}/image`,
            {
                onStart: () => NProgress.start(),
                onError: () => {
                    uploading.value = false
                    imageForm.reset()
                    if (fileInput.value) fileInput.value.value = ''
                    NProgress.done()
                },
                onProgress: (event: AxiosProgressEvent | undefined) => {
                    if (event && event.lengthComputable && event.total) {
                        const percent = (event.loaded / event.total) * 100
                        NProgress.set((percent / 100) * .9)
                    }
                },
                onSuccess: () => {
                    uploading.value = false
                    imageForm.reset()
                    if (fileInput.value) fileInput.value.value = ''
                    NProgress.done()
                }
            })
    }

const reset: () => void =
    () => imageForm.reset()

const addFiles: (event: Event) => void =
    (event: Event) => {
        const target = event.target as HTMLInputElement;
        if (target.files) {
            for (const file of target.files) {
                imageForm.images.push(file)
            }
        }
        imageForm.clearErrors()
    }
</script>