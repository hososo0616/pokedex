<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    item: Array,
    search: String,
})

</script>

<template>
    <section class=" body-font bg-sky-950 h-screen text-zinc-200">
        <div class="container mx-auto flex px-5 pt-16 items-center justify-center flex-col">
            <img class="lg:w-1/6 md:w-3/6 w-5/6 mb-6 object-cover object-center rounded" alt="hero" :src="item['front_default']">
            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-5xl mb-8 font-medium">{{ item['jp_name'] }}</h1>
                <p class="mb-8 leading-relaxed">{{ item['description'] }}</p>
                <ul class="mb-8 leading-relaxed">
                    <li>カテゴリー：{{ item['category'] }}</li>
                    <li>価格：{{ item['cost'] }}yen</li>
                    <li>en：{{ item['en_name'] }}</li>
                </ul>
                <div class="flex justify-center">
                    <Link as="button" href="#" onclick="window.history.back();" class="flex  text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">戻る</Link>
                </div>
            </div>
        </div>
    </section>
</template>
