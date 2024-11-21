<template>
    <Transition
    enter-active-class="duration-200 ease-out"
    enter-from-class="opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="duration-200 ease-in"
    leave-from-class="opacity-100"
    leave-to-class="opacity-0">

    <div v-show="toast.show"
        class="flex flex-col fixed w-[300px] right-2 -ml-[200px] top-5 py-2 px-4  bg-gray-800 text-white border-2
         rounded-lg shadow-lg shadow-black/30 border-white">

        <div class="flex justify-between items-center font-semibold">
            <div class="">{{toast.message}}</div>
        <button @click="close"
            class=" flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
        </button>
    </div>
        <!-- Progress -->
        <!-- <div>
            <div class="absolute left-0 bottom-0 right-0 h-[6px] bg-white " :style="{ 'width': `${percent}%` }"></div>
        </div> -->
    </div>
</Transition>

</template>

<script setup>

import store from "../../store/index.js";
import { computed, ref, watch } from "vue";

let interval = null;
let timeout = null;

const percent = ref(0)

const toast = computed(() => store.state.toast)
watch(store.state.toast, (newToast) => {
    if (newToast.show) {

        if (interval) {
            clearInterval(interval);
            interval = null;
        }
        if (timeout) {
            clearTimeout(timeout);
            timeout = null;
        }

        timeout = setTimeout(() => {
            close();
            timeout = null;
        }, toast.value.delay);
        const startDate = Date.now();
        const futureDate = Date.now() + toast.value.delay;
        interval = setInterval(() => {
            const date = Date.now();
            percent.value = ((date - startDate) * 100) / (futureDate - startDate);
            if (percent.value >= 100) {
                clearInterval(interval);
                interval = null;
            }
        }, 30);
    }
})

function close() {
    store.commit('hideToast')
}

</script>

<style scoped></style>
