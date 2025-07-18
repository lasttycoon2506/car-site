<template>
    <div v-if="alertMsg">
        <Alert :success="alertMsg" />
    </div>
    <div class="grid grid-cols-4 gap-5 mx-12 my-10">
        <div>
            <CarDetails :car="car"></CarDetails>
        </div>
        <div class="col-span-2">
            <img v-if="car.images.length > 0" :src="mainImage.file_url"
                class="rounded-xl border border-black max-h-80 mb-4 w-[800px] h-[500px]" />
            <div v-else
                class="flex items-center justify-center rounded-xl border border-black max-h-80 mb-4 w-[500px] h-[500px]">
                No Image Provided
            </div>
            <div class="flex gap-2">
                <img v-for="(pic, idx) in car.images" :key="idx" :src="pic.file_url"
                    class="rounded cursor-pointer w-50 h-20 object-cover border-2"
                    :class="{ 'border-black': mainImage === pic }" @click="mainImage = pic" />
            </div>
        </div>
        <div class=" ms-8">
            <div class="outline py-2 px-2 rounded-md">
                <h1 class="font-bold text-xl mb-5">Pay As You Go!</h1>
                <label class="block font-medium">Interest: <span class=" font-bold">{{ interestRate }}%</span></label>
                <input v-model.number="interestRate" type="range" min=".1" max="25" step=".1" class="cursor-pointer">
                <label class="block font-medium">Period: <span class="font-bold">{{ duration }} years</span></label>
                <input v-model.number="duration" type="range" min="1" max="25" step="1" class="cursor-pointer">
                <label class="block font-medium mt-2">You Pay: </label>
                <div class="flex justify-start items-center">
                    <div class="text-2xl font-bold">
                        <PriceFormatter :price="monthlyPayment" :allow-negative="false"></PriceFormatter>
                    </div>
                    <span> &nbsp; / month</span>
                </div>
            </div>
            <div v-if="user && !props.offerMade" class="outline py-2 px-2 rounded-md mt-5">
                <header class="mb-1 font-bold">Offer: </header>
                <MakeOffer :car-id="props.car.id ?? 0" :price="props.car.price" @updated-offer="updatedOffer = $event">
                </MakeOffer>
            </div>
            <OfferMade v-if="user && props.offerMade" :offer-made="props.offerMade" />
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Car } from '@/resources/types/car';
import { computed, ComputedRef, Ref, ref } from 'vue'
import PriceFormatter from '../../Components/PriceFormatter.vue';
import { useMonthlyPayment } from '../../Composables/useMonthlyPayment';
import MakeOffer from '../../Components/MakeOffer.vue';
import type { User } from '@/resources/types/user';
import { usePage } from '@inertiajs/vue3';
import Alert from '../../Components/Alert.vue';
import type { PageProps } from "@/resources/types/pageProps"
import OfferMade from '../../Components/OfferMade.vue';
import type { OfferMade as OfferMadeType } from '@/resources/types/offerMade';
import CarDetails from '../../Components/CarDetails.vue';


const page = usePage<PageProps>()
const props = defineProps<{
    car: Car,
    offerMade: OfferMadeType
}>()
const mainImage = ref(props.car.images[0])
const interestRate: Ref<number> = ref(3)
const duration: Ref<number> = ref(5)
const updatedOffer: Ref<number> = ref(props.car.price)

const user: ComputedRef<User | undefined> = computed(() => page.props.user)
const alertMsg: ComputedRef<string | undefined> = computed(() => page.props.flash?.success)
const monthlyPayment: ComputedRef<number> = useMonthlyPayment(updatedOffer, interestRate, duration)
</script>
