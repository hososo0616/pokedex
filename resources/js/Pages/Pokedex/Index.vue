<script setup>
import { onMounted, ref } from "vue";
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MicroModal from '@/Components/MicroModal.vue';
import SearchModal from '@/Components/SearchModal.vue';

defineProps({
    pokeinfo: Array,
    requestSortList: Array,
    sort: String,
})

</script>

<template>
    <Head title="ポケモン図鑑" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h1 class="font-semibold text-3xl text-zinc-200 leading-tight pt-4">ポケモン図鑑</h1>
                <!-- 表示順と検索のパラメータ両保持できないため保留 -->
                <div v-if="sort == 0" class="border-2 border-indigo-600 text-start md:w-1/2 md:p-5 mt-4">
                    <div class="flex">
                        <h2 class="text-xl font-bold text-zinc-200 mr-8">検索条件</h2>
                        <div>
                            <div v-if="requestSortList['search']" class="flex text-zinc-200">
                                <p>検索ワード：</p>
                                <p>{{ requestSortList['search'] }}</p>
                            </div>
                            <div v-if="requestSortList['type']" class="flex text-zinc-200">
                                <p>タイプ：</p>
                                <ul class="flex text-zinc-200">
                                    <li class="md:ml-4" v-for="param in requestSortList['type']" :key="param">{{ param }}.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="flex md:mt-4 text-zinc-200">
                        <h2 class="text-xl font-bold text-zinc-200 mr-8">表示順</h2>
                        <p v-if="requestSortList['sort']" class="font-bold">{{ requestSortList['sort'] }}</p>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <MicroModal />
                        <p class="text-center text-sm pr-8 text-zinc-200">表示順</p>
                    </div>
                    <div>
                        <SearchModal />
                        <p class="text-center text-sm text-zinc-200">検索</p>
                    </div>
                </div>
            </div>
        </template>
        <div class="py-4 bg-sky-950">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg  bg-sky-950">
                    <div class="p-6 text-gray-900">
                        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-12 mx-auto">
                            <!-- <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">ポケモン図鑑</h2>
                            </div> -->
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 md:gap-12">
                                <div v-for="poke in pokeinfo" class="text-center  bg-white rounded-xl border border-red-500 transform hover:scale-110 transition-transform">
                                    <Link :href="route('pokedex.show', { pokedex: poke['p_id'] })">
                                    <img class="rounded-xl sm:w-48 sm:h-48 lg:w-50 lg:h-50 mx-auto" :src="poke['front_default']">
                                    </Link>
                                    <div class="mt-2 sm:mt-4">
                                        <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-gray-200">
                                                                                                                {{ poke['p_id'] }}
                                                                                                                {{ poke['jp_name'] }}
                                                                                                                </h3>
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
