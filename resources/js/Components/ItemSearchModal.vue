<script setup>
import { ref } from 'vue';
import { Link } from "@inertiajs/vue3";

const value = ref(null);
const category = ref(null);
const sort = ref(null);

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
                            <div class="col-span-2">
                                <div class="md:w-full"> カテゴリ検索 </div>
                                <select name="category" id="category" v-model="category">
                                    <option hidden>選択してください</option>
                                    <option value="tool">どうぐ</option>
                                    <option value="ball">ボール</option>
                                    <option value="healing">かいふく</option>
                                    <option value="vitamins">えいようどりんく</option>
                                    <option value="stat-boosts">せんとうよう</option>
                                </select>
                            </div>
                            <div class="itemsearch-wrap col-span-2">
                                <div class="md:w-full mb-4"> 条件指定 </div>
                                <div class="item-container">
                                    <ul class="flex">
                                        <li>
                                            <input type="radio" id="f-option" name="selector" value="name-asc" v-model="sort">
                                            <label for="f-option">名前順<br>あから</label>
                                            <div class="check"></div>
                                        </li>
                                        <li>
                                            <input type="radio" id="s-option" name="selector" value="name-desc" v-model="sort">
                                            <label for="s-option">名前順<br>んから</label>
                                            <div class="check">
                                                <div class="inside"></div>
                                            </div>
                                        </li>
                                        <!-- <li>
                                            <input type="radio" id="t-option" name="selector" value="price-desc" v-model="sort">
                                            <label for="t-option">価格<br>高い順</label>
                                            <div class="check">
                                                <div class="inside"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <input type="radio" id="i-option" name="selector" value="price-asc" v-model="sort">
                                            <label for="i-option">価格<br>低い順</label>
                                            <div class="check">
                                                <div class="inside"></div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <button class="clear-radio-button" name="sex">選択解除</button> -->
                    </main>
                    <footer class="modal__footer flex justify-center">
                        <Link as="button" :href="route('pokeitem.index', { 'search': value, 'category': category, 'sort': sort,})" class="modal__btn modal__btn-search w-60 h-20">検索する</Link>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    <button type="button" data-micromodal-trigger="modal-1" @click="toggleChange"><img src="storage/mushiicon.jpeg" alt="検索" class="w-full"></button>
</template>
