<script setup>
import { onMounted, ref } from "vue";
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ItemSearchModal from '@/Components/ItemSearchModal.vue';

onMounted(() => {
    // console.log(data);
});

defineProps({
    iteminfo: Array,
})

</script>

<template>
    <Head title="どうぐ一覧" />
    <AuthenticatedLayout>
        <div class="py-4">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                            <div class="flex">
                                <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                                    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white text-zinc-200">どうぐ一覧</h2>
                                </div>
                                <div>
                                    <ItemSearchModal />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 md:gap-4">
                                <div v-for="item in iteminfo" class="text-center  bg-white rounded-xl">
                                    <Link :href="route('pokeitem.show', { pokeitem: item['item_id']})">
                                    <img class="rounded-xl sm:w-48 sm:h-48 lg:w-10 lg:h-10 mx-auto" :src="item['front_default']">
                                    </Link>
                                    <div class="mt-2 sm:mt-4">
                                        <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-gray-200">
                                            {{ item['jp_name'] }}
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
