<template>
    <nav class="bg-gray-900 text-white px-6 py-3 flex gap-6">
        <a
            v-for="cat in categories"
            :key="cat.id"
            :href="route('category.show', { slug: cat.slug })"
            class="hover:text-blue-400 font-medium"
        >
        {{ cat.name }}
        </a>
    </nav>
</template>

<script setup>
    import { ref, onMounted } from 'vue'
    import axios from 'axios'

    const categories = ref([])

    onMounted(async () => {
        axios.get('/api/v1/categories')
            .then(response => {
                categories.value = response.data
            })
            .catch(error => {
                if (error.response) {
                    console.log('Error:', error.response.data);
                }
            })
    })
</script>