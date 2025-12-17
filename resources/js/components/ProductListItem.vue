<template>
    <v-card class="mx-auto my-4" outlined>
        <div class="w-full bg-gray rounded-xl overflow-hidden">
            <a :href="product.external_url" target="_blank">
                <v-img
                    :src="product.image_url"
                    height="200"
                    class="cursor-pointer"
                    :alt="product.name"
                ></v-img>
            </a>
        </div>

        <v-card-title class="grow">
            <a
                :href="product.external_url"
                target="_blank"
                class="text-sm font-medium no-underline text--primary line-clamp"
            >
                {{ product.name }}
            </a>
        </v-card-title>

        <v-card-subtitle class="text-red-600 font-bold">
            {{ $t('product.price') }}: {{ $t('price.currency') }}{{ product.price }}
        </v-card-subtitle>

        <v-card-actions>
            <a :href="product.external_url" target="_blank">
                <v-btn
                    color="primary"
                    text
                >
                    {{ $t('product.view') }}
                </v-btn>
            </a>
        </v-card-actions>
    </v-card>
</template>

<script setup>
    defineProps({
        product: Object,
    })
</script>

<style scoped>
    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-word;
    }
</style>