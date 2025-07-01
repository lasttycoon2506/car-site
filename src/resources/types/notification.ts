export type Notification = {
    id: string;
    created_at: string;
    data: {
        car_id: number;
        car_make: string;
        car_model: string;
        bidder_id: number;
        offer_id: number;
        amount: number;
    };
    read_at: null | string;
};
