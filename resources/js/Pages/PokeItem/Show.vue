<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    item: Array,
    search: String,
})

</script>

<template>
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py- items-center justify-center flex-col">
            <img class="lg:w-1/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" :src="item['front_default']">
            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-8 font-medium text-gray-900">{{ item['jp_name'] }}</h1>
                <p class="mb-8 leading-relaxed">{{ item['description'] }}</p>
                <ul class="mb-8 leading-relaxed">
                    <li>カテゴリー：{{ item['category'] }}</li>
                    <li>価格：{{ item['cost'] }}</li>
                    <li>en：{{ item['en_name'] }}</li>
                </ul>
                <div class="flex justify-center">
                    <Link as="button" :href="route('pokeitem.index')" class="flex  text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">戻る</Link>
                </div>
            </div>
        </div>
    </section>
</template>
