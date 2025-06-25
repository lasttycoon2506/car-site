<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <div v-if="uploading" class="text-center mt-4 font-semibold">
        <span>Uploading image(s), please wait...</span>
    </div>
    <div class="border border-black w-3/4 mt-10 ms-10 rounded-md py-5 px-5">
        <header class=" text-gray-600 mb-2">Upload Pictures</header>
        <form @submit.prevent="uploadImages">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="flex justify-between">
                <div class="w-3/5">
                    <input type="file" ref="fileInput" multiple @input="addFiles"
                        class="file:border-0 file:py-2 file:px-3 file:me-3 rounded-md border border-gray-300 w-full">
                </div>
                <div>
                    <button type="submit" :disabled="!fileExists"
                        class=" bg-lime-500 disabled:opacity-30 rounded-lg py-3 px-10 me-10 font-semibold">submit</button>
                    <button type="reset" @click="reset"
                        class="bg-red-600 rounded-lg py-3 px-11 font-semibold">reset</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup lang="ts">
import Alert from '../../../Components/Alert.vue';
import { Car } from '@/resources/types/car';
import { InertiaForm, useForm, usePage } from '@inertiajs/vue3';
import { computed, ComputedRef, Ref, ref } from 'vue';
import NProgress from 'nprogress'
import { AxiosProgressEvent } from 'axios';

type PageProps = {
    flash: { success: string },
}

const uploading: Ref<boolean> = ref(false)
const fileInput: Ref<HTMLInputElement | null> = ref<HTMLInputElement | null>(null)
const csrf: string = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
const props = defineProps<{ car: Car }>()
const imageForm: InertiaForm<{ images: File[]; }> =
    useForm<{ images: File[] }>({ images: [] })
const page = usePage<PageProps>()

const alertMsg: ComputedRef<string> = computed(() => page.props.flash?.success)
const fileExists: ComputedRef<boolean> = computed(() => imageForm.images.length > 0)

const uploadImages: () => void =
    () => {
        uploading.value = true
        imageForm.post(
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
                    uploading.value = false
                    imageForm.reset()
                    if (fileInput.value) fileInput.value.value = ''
                    NProgress.done()
                    console.log(alertMsg)
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
    }
</script>