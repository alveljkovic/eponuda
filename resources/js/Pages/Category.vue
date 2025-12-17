<template>
    <AppLayout :products="products" :breadcrumbs="breadcrumbs">
        <v-container fluid>
            <v-row>
                <v-col cols="3">
                    <CategoryList
                    :total-products="totalProducts"
                    :child-categories="childCategories"
                    />
                </v-col>

                <v-col cols="9">
                    <ProductList :products="products" />
                </v-col>
            </v-row>
        </v-container>
    </AppLayout>
</template>

<script setup>
    import { computed } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import CategoryList from '@/Components/CategoryList.vue'
    import ProductList from '@/Components/ProductList.vue'

    const props = defineProps({
        childCategories: {
            type: Array,
            required: true
        },
        totalProducts: {
            type: Number,
            required: true
        },
        products: {
            type: Object,
            required: true
        },
        selectedCategory: {
            type: Object,
            required: false
        },
        breadcrumbs: {
            type: Array,
            required: true
        }
    })
</script>