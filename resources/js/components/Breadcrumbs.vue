<template>
    <v-breadcrumbs :items="items"></v-breadcrumbs>
</template>

<script setup>
    defineProps({
        items: {
            type: Array,
            required: true,
        },
    })
</script>