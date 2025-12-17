<template>
    <v-app>
        <HeaderLogo />
        <TopMenu />
        <Breadcrumbs :items="breadcrumbs" />
        <slot />
    </v-app>
</template>

<script setup>
    import HeaderLogo from '@/Components/HeaderLogo.vue'
    import TopMenu from '@/Components/TopMenu.vue'
    import Breadcrumbs from '@/Components/Breadcrumbs.vue'

    defineProps({
        breadcrumbs: Array
    })
</script>
