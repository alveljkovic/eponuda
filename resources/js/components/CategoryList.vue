<template>
    <v-container fluid>
        <v-card class="mx-auto my-4" outlined>
            <v-card-title class="text-h6">
                Total products: {{ totalProducts }}
            </v-card-title>

            <v-list v-if="childCategories.length" dense>
                <v-list-item
                    v-for="child in childCategories"
                    :key="child.id"
                    class="justify-space-between"
                    link
                >
                    <Link
                        :href="route('category.show', child.slug)"
                        class="w-full flex justify-between items-center no-underline"
                    >
                        <v-list-item-title>{{ child.name }} ({{ child.products_count }})</v-list-item-title>
                    </Link>
                </v-list-item>
            </v-list>
        </v-card>
    </v-container>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3'

    defineProps({
        childCategories: {
            type: Array,
            required: true,
        },
        totalProducts: {
            type: Number,
            required: true,
        },
    })
</script>