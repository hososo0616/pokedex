<script setup>
import { ref } from 'vue';
import { createRouter, createWebHistory } from 'vue-router'
import { useRoute, useRouter, RouterLink } from 'vue-router'
import { watch, onMounted } from 'vue';
import { Link } from "@inertiajs/vue3";

const isShow = ref(false);

const toggleChange = () => { isShow.value = !isShow.value }

// const router = useRouter()

// const moveNextScreen = () => {
//     const url = "pokedex";
//     const obj = {
//         params: {
//             order: 'desc',
//         },
//     };
//     axios
//         .get(url, obj)
//         .then(() => {
//             toggleChange();
//         })
//         .catch((err) => {
//             console.log(err);
//         });
// }



</script>
<template>
  <div class="modal" id="modal-1" aria-hidden="true" v-show="isShow">
    <div class="modal__overlay  z-10" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
                                                                      表示順変更</h2>
          <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close @click="toggleChange"></button>
        </header>
        <main class="modal__content" id="modal-1-content">
          <div class="grid sm: grid-cols-1 md:grid-cols-2 gap-4">
            <Link as="button" :href="route('pokedex.index', {'id': 1})" class="modal__btn modal__btn-search w-60 h-20">図鑑番号　１～</Link>
            <!-- <button type="button" class="modal__btn modal__btn-search w-60 h-20" onclick="location.href='{{ route('pokedex.i1ndex') }}'">図鑑番号　１～</button> -->
            <button type="button" class="modal__btn modal__btn-search w-60 h-20" @click="toggleChange">図鑑番号　～１００８</button>
            <button type="button" class="modal__btn modal__btn-search w-60 h-20" @click="toggleChange">名前　あ～</button>
            <button type="button" class="modal__btn modal__btn-search w-60 h-20" @click="toggleChange">名前　～ん</button>
            <button type="button" class="modal__btn modal__btn-search w-60 h-20" @click="toggleChange">高さ　高</button>
            <button type="button" class="modal__btn modal__btn-search w-60 h-20" @click="toggleChange">高さ　低</button>
            <button type="button" class="modal__btn modal__btn-search w-60 h-20" @click="toggleChange">重さ　高</button>
            <button type="button" class="modal__btn modal__btn-search w-60 h-20" @click="toggleChange">重さ　低</button>

        </div>
        </main>
        <!-- <footer class="modal__footer ">
                    <button type="button" class="modal__btn mx-auto" data-micromodal-close aria-label="Close this dialog window" @click="toggleChange">Close</button>
                </footer> -->
      </div>
    </div>
  </div>
  <button type="button" data-micromodal-trigger="modal-1" @click="toggleChange"><img src="storage/change.jpeg" alt="表示順" class="h-full"></button>
</template>
