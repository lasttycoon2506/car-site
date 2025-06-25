<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <div class="border border-black w-1/2 mt-10 ms-10 rounded-md py-5 px-5">
        <header class=" text-gray-600 mb-2">Upload Pics.</header>
        <form @submit.prevent="uploadImages">
            <input type="hidden" name="_token" :value="csrf" />
            <input type="file" multiple @input="addFiles"
                class="file:border-0 file:py-2 file:px-3 file:me-3 rounded-md border border-gray-300 me-12">
            <button type="submit" :disabled="!fileExists"
                class=" bg-lime-500 disabled:opacity-20 rounded-lg py-3 px-7 me-3">submit</button>
            <button type="reset" @click="reset" class="bg-red-600 rounded-lg py-3 px-8">reset</button>
        </form>
    </div>
</template>

<script setup lang="ts">
import Alert from '../../../Components/Alert.vue';
import { Car } from '@/resources/types/car';
import { InertiaForm, useForm, usePage } from '@inertiajs/vue3';
import { computed, ComputedRef } from 'vue';
import NProgress from 'nprogress'
import { AxiosProgressEvent } from 'axios';

type PageProps = {
    flash: { success: string },
}

const csrf: string = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
const props = defineProps<{ car: Car }>()
const imageForm: InertiaForm<{ images: File[]; }> =
    useForm<{ images: File[] }>({ images: [] })
const page = usePage<PageProps>()

const alertMsg: ComputedRef<string> = computed(() => page.props.flash?.success)
const fileExists: ComputedRef<boolean> = computed(() => imageForm.images.length > 0)

const uploadImages: () => void =
    () => imageForm.post(
        `/seller/car/${props.car.id}/image`,
        {
            onStart: () => NProgress.start(),
            onProgress: (event: AxiosProgressEvent | undefined) => {
                if (event && event.lengthComputable && event.total) {
                    const percent = (event.loaded / event.total) * 100
                    NProgress.set((percent / 100) * .9)
                }
            },
            onSuccess: () => {
                imageForm.reset()
                NProgress.done()
            }
        })

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
    }
</script>