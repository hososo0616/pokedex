<script setup>
import { onMounted, ref } from "vue";
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MicroModal from '@/Components/MicroModal.vue';
import SearchModal from '@/Components/SearchModal.vue';

defineProps({
    pokemon: Array,
})

</script>

<template>
    <Head title="ポケモンパーティ" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h1 class="font-semibold text-3xl text-zinc-200 leading-tight pt-4">ポケモン図鑑</h1>
            </div>
        </template>
        <div class="py-4 bg-sky-950">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg  bg-sky-950">
                    <div class="p-6 text-gray-900">
                        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-12 mx-auto">
                            aaaaaaaaaaaa
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
