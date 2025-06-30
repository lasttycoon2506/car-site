import { computed, ComputedRef, isRef, Ref } from "vue";

export const useMonthlyPayment = (
    price: Ref<number> | number,
    interestRate: Ref<number> | number,
    duration: Ref<number> | number
) => {
    const monthlyPayment: ComputedRef<number> = computed(() => {
        const monthlyInterest: number =
            (isRef(interestRate) ? interestRate.value : interestRate) /
            100 /
            12;
        const monthsOfPayment: number =
            (isRef(duration) ? duration.value : duration) * 12;

        const priceValue: number = isRef(price) ? price.value : price;
        return (
            (priceValue *
                monthlyInterest *
                Math.pow(1 + monthlyInterest, monthsOfPayment)) /
            (Math.pow(1 + monthlyInterest, monthsOfPayment) - 1)
        );
    });

    return monthlyPayment;
};
