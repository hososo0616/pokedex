<script setup>
import { ref } from 'vue';
import { Link } from "@inertiajs/vue3";

const value = ref(null);
const checks = ref([]);

const isShow = ref(false);
const toggleChange = () => { isShow.value = !isShow.value }
</script>
<template>
    <div class="modal" id="modal-1" aria-hidden="true" v-show="isShow">
        <div class="modal__overlay z-10" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <form action="" method="GET">
                    <header class="modal__header">
                        <h2 class="modal__title" id="modal-1-title">
                                                   条件検索</h2>
                        <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close @click="toggleChange"></button>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                        <div class="grid sm: grid-cols-1 md:grid-cols-2 gap-8 ">
                            <div class="col-span-2">
                                <div class="md:w-full"> フリーワード検索 </div>
                                <div>
                                    <input type="search" class="md:w-full" placeholder="名前で探す" name="search" v-model="value">
                                </div>
                            </div>
                            <div class="md:w-full">
                                <div class="md:w-full"> カテゴリ検索 </div>
                                <select name="category" id="category">
                                    <option value="standard-balls">通常のボール</option>
                                    <option value="special-balls">特別なボール</option>
                                    <option value="healing">かいふく</option>
                                    <option value="status-cures">じょうたいかいふく</option>
                                </select>
                            </div>

                        </div>
                    </main>
                    <footer class="modal__footer flex justify-center">
                        <Link as="button" :href="route('pokeitem.index', { 'search': value })" class="modal__btn modal__btn-search w-60 h-20">検索する</Link>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    <button type="button" data-micromodal-trigger="modal-1" @click="toggleChange"><img src="storage/mushiicon.jpeg" alt="検索" class="w-full"></button>
</template>
