import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import MainLayout from "./Layouts/MainLayout.vue";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        const page = await pages[`./Pages/${name}.vue`]

        //settings  main layout to be used by all vue components
        page.default.layout = page.default.layout || MainLayout
        return page
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .mount(el)
    },
}).then(module => console.log(module));
