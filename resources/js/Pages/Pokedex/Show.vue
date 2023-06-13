<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";

defineProps({
    pokemon: Array,
})

const active = ref(true);

const changeImage = () => {
    active.value = !active.value;
}

</script>
<template>
    <section class="text-zinc-200 body-font overflow-hidden bg-sky-950 shadow">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded">
                    <img v-if="active == true" alt="ecommerce" class="w-full lg:h-auto h-64 object-cover object-center rounded" :src="pokemon['front_default']">
                    <img v-if="active == false" alt="ecommerce" class="w-full lg:h-auto h-64 object-cover object-center rounded" :src="pokemon['back_default']">
                </div>
                <div class="lg:w-2/5 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest md:mb-2 text-zinc-200">ID:{{ pokemon['p_id'] }}</h2>
                    <h1 class="text-gray-900 text-4xl title-font font-medium mb-4 text-zinc-200">{{ pokemon['jp_name'] }}</h1>
                    <div class="flex mb-4 text-zinc-200">
                        <span class="flex items-center">
                            <span>タイプ：</span>
                            <span class="text-zinc-200 ml-3">{{ pokemon['type1'] }}</span>
                            <span v-if="(pokemon['type2'])" class="text-zinc-200 ml-3">{{ pokemon['type2'] }}</span>
                        </span>
                    </div>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <span>とくせい：</span>
                            <span class="text-zinc-200 ml-3">{{ pokemon['ability1'] }}</span>
                            <span v-if="(pokemon['ability2'])" class="text-zinc-200 ml-3">{{ pokemon['ability2'] }}</span>
                            <span v-if="(pokemon['hidden_ability'])" class="text-zinc-200 ml-3">{{ pokemon['hidden_ability'] }}</span>
                        </span>
                    </div>
                    <div class="w-4/5">
                        <div class="flex justify-between">
                            <p class="leading-relaxed">Hit Points:</p>
                            <p>{{ pokemon['hp'] }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed">Attack:</p>
                            <p>{{ pokemon['attack'] }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed">Defense:</p>
                            <p>{{ pokemon['defense'] }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed">Special Attack:</p>
                            <p>{{ pokemon['special_attack'] }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed">Special Defense:</p>
                            <p>{{ pokemon['special_defense'] }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed">Speed:</p>
                            <p>{{ pokemon['speed'] }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed">total:</p>
                            <p class="text-xl">{{ pokemon['total_stats'] }}</p>
                        </div>
                    </div>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                        <div class="flex">
                            <span class="mr-3">向き変更ボタン</span>
                            <button type="button" class="border-2 border-gray-300 ml-1 bg-blue-700 rounded-full w-6 h-6 focus:outline-none" @click="changeImage"></button>
                            <!-- <button class="border-2 border-gray-300 ml-1 bg-indigo-500 rounded-full w-6 h-6 focus:outline-none"></button> -->
                        </div>
                    </div>
                    <div class="flex">
                        <Link as="button" href="#" onclick="window.history.back();" class="flex  text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">戻る</Link>
                        <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
