<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <form @submit.prevent="uploadImages">
        <input type="hidden" name="_token" :value="csrf" />
        <input type="file" multiple @input="addFiles">
        <button type="submit">submit</button>
        <button type="reset" @click="reset">reset</button>
    </form>
</template>

<script setup lang="ts">
import Alert from '@/resources/js/Components/Alert.vue';
import { Car } from '@/resources/types/car';
import { InertiaForm, useForm, usePage } from '@inertiajs/vue3';
import { computed, ComputedRef } from 'vue';

type PageProps = {
    flash: { success: string },
}

const csrf: string = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
const props = defineProps<{ car: Car }>()
const imageForm: InertiaForm<{ images: File[]; }> =
    useForm<{ images: File[] }>({ images: [] })
const page = usePage<PageProps>()
const alertMsg: ComputedRef<string> = computed(() => page.props.flash?.success)

const uploadImages: () => void =
    () => imageForm.post(
        `/seller/car/${props.car.id}/image`,
        { onSuccess: () => imageForm.reset() })

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