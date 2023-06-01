<script setup>
import { onMounted } from "vue";
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
onMounted(() => {
    // console.log(data);
});

defineProps({
    pokeinfo: Array,
})
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="py-4 bg-blue-200">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  bg-blue-200">
                    <div class="p-6 text-gray-900">
                        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">ポケモン図鑑</h2>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 md:gap-12">
                                <div v-for="poke in pokeinfo" class="text-center  bg-white rounded-xl">
                                    <Link :href="route('pokedex.show', { pokedex: poke['p_id'] })">
                                    <img class="rounded-xl sm:w-48 sm:h-48 lg:w-60 lg:h-60 mx-auto" :src="poke['front_default']">
                                    </Link>
                                    <div class="mt-2 sm:mt-4">
                                        <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-gray-200">
                                        {{ poke['p_id'] }}
                                        {{ poke['jp_name'] }}
                                        </h3>
                                        <p class="text-xs text-gray-600 sm:text-sm lg:text-base dark:text-gray-400">
                                          Founder / CEO
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
