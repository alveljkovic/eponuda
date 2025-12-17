import { createI18n } from 'vue-i18n'
import sl from './locales/sl.json'

export const i18n = createI18n({
    legacy: false,
    locale: 'sl',
    fallbackLocale: 'sl',
    messages: { sl }
})