import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import "../css/app.css";
import MainLayout from "./Layouts/MainLayout.vue";

declare global {
    interface ImportMeta {
        glob: (
            pattern: string,
            options?: { eager?: boolean }
        ) => Record<string, DefineComponent>;
    }
}

createInertiaApp({
    progress: false,
    resolve: (name: string) => {
        const pages: Record<string, DefineComponent> = import.meta.glob(
            "./Pages/**/*.vue",
            { eager: true }
        );
        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || MainLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
