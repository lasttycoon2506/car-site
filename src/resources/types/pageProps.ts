import type { User } from "./user";

export type PageProps = {
    user?: User;
    flash?: { success: string };
};
