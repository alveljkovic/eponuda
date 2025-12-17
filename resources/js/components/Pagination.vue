<template>
    <v-container class="mt-6">
        <v-row justify="center">
            <v-btn-toggle
                divided
                variant="outlined"
            >
                <Link
                    v-for="link in links"
                    :key="link.label"
                    :href="link.url || ''"
                    as="button"
                    preserve-scroll
                    class="rounded-lg p-4 w-full h-full flex justify-center"
                >
                    <v-btn
                        :disabled="!link.url"
                        variant="text"
                        :class="link.active ? 'bg-blue' : ''"
                    >
                        {{ formatLabel(link.label) }}
                    </v-btn>
                </Link>
            </v-btn-toggle>
        </v-row>
    </v-container>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3'
    import { useI18n } from 'vue-i18n'

    defineProps({
        links: {
            type: Object,
            required: true,
        },
    })

    const { t } = useI18n()

    function formatLabel(label) {
        const clean = label.replace(/&laquo;|&raquo;/g, '').trim()
        if (clean === 'Previous') return t('pagination.previous')
        if (clean === 'Next') return t('pagination.next')
        return clean
    }
</script>