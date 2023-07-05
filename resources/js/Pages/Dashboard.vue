<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    pokemon: Array,
})
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-3xl font-bold text-center">本日のおすすめポケモン</div>
                    <div class="flex justify-around">
                        <div class="lg:w-1/3 w-full lg:h-auto h-64 object-cover object-center rounded">
                            <img  alt="ecommerce" class="w-full lg:h-auto h-64 object-cover object-center rounded" :src="pokemon['front_default']">
                        </div>
                        <div class="lg:w-1/3 w-full">
                            <div class="text-2xl mt-12">図鑑No：{{ pokemon['id'] }}</div>
                            <div class="text-2xl mt-14">名前：{{ pokemon['jp_name'] }}</div>
                            <div class="text-2xl mt-12">タイプ1：{{ pokemon['type1'] }}</div>
                            <div class="text-2xl mt-12">タイプ2：<span v-if="(pokemon['type2'])">{{ pokemon['type2'] }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
