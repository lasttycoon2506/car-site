import type { Image } from "./image";

export type Car = {
    id?: number;
    make: string;
    model: string;
    condition: string;
    transmission: string;
    drive_type: string;
    year: number;
    mpg: number;
    miles: number;
    price: number;
    images: Image[];
    offers_count: number;
};
