import type { Car } from "./car"; // Update the path as needed
import { Link } from "./link";

export type Cars = {
    data: Car[];
    links: Link[];
};
