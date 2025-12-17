<template>
    <v-container fluid>
        <v-row align="stretch" dense>
            <v-col
                v-for="product in products.data"
                :key="product.id"
                cols="12"
                sm="6"
                md="3"
            >
                <ProductListItem :product="product" />
            </v-col>
        </v-row>
        <Pagination :links="products.links" />
    </v-container>
</template>

<script setup>
    import ProductListItem from './ProductListItem.vue'
    import Pagination from './Pagination.vue'

    defineProps({
        products: {
            type: Object,
            required: true,
        },
    })
</script>