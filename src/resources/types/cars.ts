import type { Car } from "./car";
import { Link } from "./link";

export type Cars = {
    data: Car[];
    links: Link[];
    total: number;
};
