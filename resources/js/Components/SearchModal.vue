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
                        <div class="grid sm: grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="col-span-2">
                                <div class="md:w-full"> フリーワード検索 </div>
                                <div>
                                    <input type="search" class="md:w-full" placeholder="名前で探す" name="search" v-model="value">
                                </div>
                            </div>
                            <p>{{ value }}</p>
                            <div class="col-span-2">
                                <div class="md:w-full mb-4"> タイプ </div>
                                <fieldset class="grid sm: grid-cols-1 md:grid-cols-6 gap-x-2 gap-y-5">
                                    <div>
                                        <input id="item-1" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-1" v-model="checks" />
                                        <label class="radio-inline__label type1" for="item-1"> ノーマル </label>
                                    </div>
                                    <div>
                                        <input id="item-2" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-2" v-model="checks" />
                                        <label class="radio-inline__label type2" for="item-2"> ほのお </label>
                                    </div>
                                    <div>
                                        <input id="item-3" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-3" v-model="checks" />
                                        <label class="radio-inline__label type3" for="item-3"> みず </label>
                                    </div>
                                    <div>
                                        <input id="item-4" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-4" v-model="checks" />
                                        <label class="radio-inline__label type4" for="item-4"> でんき </label>
                                    </div>
                                    <div>
                                        <input id="item-5" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-5" v-model="checks" />
                                        <label class="radio-inline__label type5" for="item-5"> くさ </label>
                                    </div>
                                    <div>
                                        <input id="item-6" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-6" v-model="checks" />
                                        <label class="radio-inline__label type6" for="item-6"> こおり </label>
                                    </div>
                                    <div>
                                        <input id="item-7" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-7" v-model="checks" />
                                        <label class="radio-inline__label type7" for="item-7"> かくとう </label>
                                    </div>
                                    <div>
                                        <input id="item-8" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-8" v-model="checks" />
                                        <label class="radio-inline__label type8" for="item-8"> どく </label>
                                    </div>
                                    <div>
                                        <input id="item-9" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-9" v-model="checks" />
                                        <label class="radio-inline__label type9" for="item-9"> じめん </label>
                                    </div>
                                    <div>
                                        <input id="item-10" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-10" v-model="checks" />
                                        <label class="radio-inline__label type10" for="item-10"> ひこう </label>
                                    </div>
                                    <div>
                                        <input id="item-11" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-11" v-model="checks" />
                                        <label class="radio-inline__label type11" for="item-11"> エスパー </label>
                                    </div>
                                    <div>
                                        <input id="item-12" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-12" v-model="checks" />
                                        <label class="radio-inline__label type12" for="item-12"> むし </label>
                                    </div>
                                    <div>
                                        <input id="item-13" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-13" v-model="checks" />
                                        <label class="radio-inline__label type13" for="item-13"> いわ </label>
                                    </div>
                                    <div>
                                        <input id="item-14" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-14" v-model="checks" />
                                        <label class="radio-inline__label type14" for="item-14"> ゴースト </label>
                                    </div>
                                    <div>
                                        <input id="item-15" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-15" v-model="checks" />
                                        <label class="radio-inline__label type15" for="item-15"> ドラゴン </label>
                                    </div>
                                    <div>
                                        <input id="item-16" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-16" v-model="checks" />
                                        <label class="radio-inline__label type16" for="item-16"> あく </label>
                                    </div>
                                    <div>
                                        <input id="item-17" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-17" v-model="checks" />
                                        <label class="radio-inline__label type17" for="item-17"> はがね </label>
                                    </div>
                                    <div>
                                        <input id="item-18" class="radio-inline__input" type="checkbox" name="accessible-radio" value="item-18" v-model="checks" />
                                        <label class="radio-inline__label type18" for="item-18"> フェアリー </label>
                                    </div>
                                </fieldset>
                            </div>
                            <p>{{ checks }}</p>
                            <!-- 特性の一覧が取得できていないので保留 -->
                            <!-- <div class="col-span-2">
                            <div class="md:w-full"> とくせい </div>
                            <div>
                                <input type="text" class="md:w-full" placeholder="名前で探す">
                            </div>
                        </div> -->
                        </div>
                    </main>
                    <footer class="modal__footer flex justify-center">
                        <Link as="button" :href="route('pokedex.index', { 'value': value, 'type': checks })" class="modal__btn modal__btn-search w-60 h-20">検索する</Link>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    <button type="button" data-micromodal-trigger="modal-1" @click="toggleChange"><img src="storage/mushiicon.jpeg" alt="検索" class="w-full"></button>
</template>
