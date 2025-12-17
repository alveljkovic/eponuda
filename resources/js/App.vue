<template>
    <div class="min-h-screen bg-gray-50">
        <HeaderLogo />
        <TopMenu />
        <Breadcrumbs :items="[]" />
        <router-view />
    </div>
</template>

<script setup>
    import HeaderLogo from '@/components/HeaderLogo.vue'
    import TopMenu from '@/components/TopMenu.vue'
    import Breadcrumbs from '@/components/Breadcrumbs.vue'
</script>