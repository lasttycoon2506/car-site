import { computed, Ref } from "vue";

export const useMonthlyPayment = (
    price: number,
    interestRate: Ref<number>,
    duration: Ref<number>
) => {
    const monthlyPayment = computed(() => {
        const monthlyInterest = interestRate.value / 100 / 12;
        const monthsOfPayment = duration.value * 12;

        return (
            (price *
                monthlyInterest *
                Math.pow(1 + monthlyInterest, monthsOfPayment)) /
            (Math.pow(1 + monthlyInterest, monthsOfPayment) - 1)
        );
    });

    return monthlyPayment;
};
