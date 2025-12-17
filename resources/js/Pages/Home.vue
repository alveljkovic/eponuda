<template>
    <AppLayout :products="products" :breadcrumbs="breadcrumbs">
        <ProductList :products="products" />
    </AppLayout>
</template>

<script setup>
    import { computed } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import CategoryList from '@/Components/CategoryList.vue'
    import ProductList from '@/Components/ProductList.vue'

    const props = defineProps({
        products: {
            type: Object,
            required: true
        },
        breadcrumbs: {
            type: Array,
            required: true
        }
    })
</script>