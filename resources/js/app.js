import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { i18n } from './i18n'
import { ZiggyVue } from 'ziggy-js'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({ components, directives })

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) })

        vueApp
            .use(plugin)
            .use(vuetify)
            .use(i18n)
            .use(ZiggyVue, props.initialPage.props.ziggy)
            .mount(el);
    },
})
