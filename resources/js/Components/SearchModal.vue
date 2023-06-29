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
                            <div class="col-span-2">
                                <div class="md:w-full mb-4"> タイプ </div>
                                <fieldset class="grid sm: grid-cols-1 md:grid-cols-6 gap-x-2 gap-y-5">
                                    <div>
                                        <input id="normal" class="radio-inline__input" type="checkbox" name="accessible-radio" value="normal" v-model="checks" />
                                        <label class="radio-inline__label type1" for="normal"> ノーマル </label>
                                    </div>
                                    <div>
                                        <input id="fire" class="radio-inline__input" type="checkbox" name="accessible-radio" value="fire" v-model="checks" />
                                        <label class="radio-inline__label type2" for="fire"> ほのお </label>
                                    </div>
                                    <div>
                                        <input id="water" class="radio-inline__input" type="checkbox" name="accessible-radio" value="water" v-model="checks" />
                                        <label class="radio-inline__label type3" for="water"> みず </label>
                                    </div>
                                    <div>
                                        <input id="electric" class="radio-inline__input" type="checkbox" name="accessible-radio" value="electric" v-model="checks" />
                                        <label class="radio-inline__label type4" for="electric"> でんき </label>
                                    </div>
                                    <div>
                                        <input id="grass" class="radio-inline__input" type="checkbox" name="accessible-radio" value="grass" v-model="checks" />
                                        <label class="radio-inline__label type5" for="grass"> くさ </label>
                                    </div>
                                    <div>
                                        <input id="ice" class="radio-inline__input" type="checkbox" name="accessible-radio" value="ice" v-model="checks" />
                                        <label class="radio-inline__label type6" for="ice"> こおり </label>
                                    </div>
                                    <div>
                                        <input id="fight" class="radio-inline__input" type="checkbox" name="accessible-radio" value="fight" v-model="checks" />
                                        <label class="radio-inline__label type7" for="fight"> かくとう </label>
                                    </div>
                                    <div>
                                        <input id="poison" class="radio-inline__input" type="checkbox" name="accessible-radio" value="poison" v-model="checks" />
                                        <label class="radio-inline__label type8" for="poison"> どく </label>
                                    </div>
                                    <div>
                                        <input id="ground" class="radio-inline__input" type="checkbox" name="accessible-radio" value="ground" v-model="checks" />
                                        <label class="radio-inline__label type9" for="ground"> じめん </label>
                                    </div>
                                    <div>
                                        <input id="flying" class="radio-inline__input" type="checkbox" name="accessible-radio" value="flying" v-model="checks" />
                                        <label class="radio-inline__label type10" for="flying"> ひこう </label>
                                    </div>
                                    <div>
                                        <input id="esper" class="radio-inline__input" type="checkbox" name="accessible-radio" value="esper" v-model="checks" />
                                        <label class="radio-inline__label type11" for="esper"> エスパー </label>
                                    </div>
                                    <div>
                                        <input id="bug" class="radio-inline__input" type="checkbox" name="accessible-radio" value="bug" v-model="checks" />
                                        <label class="radio-inline__label type12" for="bug"> むし </label>
                                    </div>
                                    <div>
                                        <input id="rock" class="radio-inline__input" type="checkbox" name="accessible-radio" value="rock" v-model="checks" />
                                        <label class="radio-inline__label type13" for="rock"> いわ </label>
                                    </div>
                                    <div>
                                        <input id="ghrost" class="radio-inline__input" type="checkbox" name="accessible-radio" value="ghrost" v-model="checks" />
                                        <label class="radio-inline__label type14" for="ghrost"> ゴースト </label>
                                    </div>
                                    <div>
                                        <input id="dragon" class="radio-inline__input" type="checkbox" name="accessible-radio" value="dragon" v-model="checks" />
                                        <label class="radio-inline__label type15" for="dragon"> ドラゴン </label>
                                    </div>
                                    <div>
                                        <input id="aku" class="radio-inline__input" type="checkbox" name="accessible-radio" value="aku" v-model="checks" />
                                        <label class="radio-inline__label type16" for="aku"> あく </label>
                                    </div>
                                    <div>
                                        <input id="iron" class="radio-inline__input" type="checkbox" name="accessible-radio" value="iron" v-model="checks" />
                                        <label class="radio-inline__label type17" for="iron"> はがね </label>
                                    </div>
                                    <div>
                                        <input id="fairy" class="radio-inline__input" type="checkbox" name="accessible-radio" value="fairy" v-model="checks" />
                                        <label class="radio-inline__label type18" for="fairy"> フェアリー </label>
                                    </div>
                                </fieldset>
                            </div>
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
                        <Link as="button" :href="route('pokedex.index', { 'search': value, 'type': checks })" class="modal__btn modal__btn-search w-60 h-20">検索する</Link>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    <button type="button" data-micromodal-trigger="modal-1" @click="toggleChange"><img src="storage/mushiicon.jpeg" alt="検索" class="w-full"></button>
</template>
