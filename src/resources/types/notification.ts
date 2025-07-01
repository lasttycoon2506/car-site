export type Notification = {
    id: string;
    created_at: string;
    data: {
        car_id: number;
        bidder_id: number;
        offer_id: number;
        amount: number;
    };
    read_at: null | string;
    updated_at: string;
};
