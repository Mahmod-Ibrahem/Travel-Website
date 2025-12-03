<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 p-4 md:p-8">
        <!-- Header -->
        <div class="max-w-7xl mx-auto mb-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h1 v-if="!loading" class="text-2xl md:text-3xl font-bold text-slate-800">
                    {{ review.id ? `Update Review` : 'Create New Review' }}
                </h1>
            </div>
            <p v-if="review.id && !loading" class="text-slate-500 ml-13">
                Editing: <span class="font-medium text-indigo-600">{{ review.title }}</span>
            </p>
        </div>

        <div class="max-w-7xl mx-auto">
            <Spinner v-if="loading"
                class="fixed inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center z-50" />

            <form v-else @submit.prevent="onSubmit">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Review Information
                        </h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Tour Selection -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Tour <span class="text-red-500">*</span>
                            </label>
                            <Select name="type" v-model="review.tour_id" :options="[
                                { id: null, title: '🏠 Home Page' },
                                ...tours
                            ]" optionLabel="title" optionValue="id"
                                placeholder="Select Tour That This Review Belongs To" class="w-full" />
                            <p v-if="errors.tour_id?.[0]" class="mt-1.5 text-red-500 text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ errors.tour_id[0] }}
                            </p>
                        </div>

                        <!-- Reviewer Name -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Reviewer Name <span class="text-red-500">*</span>
                            </label>
                            <CustomInput v-model="review.reviewer" :errors="errors.reviewer"
                                placeholder="Enter Reviewer Name" />
                        </div>

                        <!-- Review Title -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Review Title <span class="text-red-500">*</span>
                            </label>
                            <CustomInput v-model="review.title" :errors="errors.title"
                                placeholder="Enter Review Title" />
                        </div>

                        <!-- Review Content -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Review Content <span class="text-red-500">*</span>
                            </label>
                            <CustomInput type="textarea" v-model="review.content" :errors="errors.content"
                                placeholder="Enter Review Content" />
                        </div>
                    </div>
                </div>
                <!-- Actions Footer -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 px-6 py-4 
                flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3 mt-6">
                    <RouterLink :to="{ name: 'app.reviews' }" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 
                    text-slate-600 hover:text-slate-800 hover:bg-slate-100 
                    rounded-xl transition-all duration-200 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel
                    </RouterLink>

                    <div class="flex gap-3">
                        <button type="button" @click="onSubmit($event, true)" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 
                        px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 
                        hover:from-indigo-700 hover:to-indigo-800 text-white 
                        rounded-xl font-medium shadow-lg shadow-indigo-500/25 
                        transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Save Review
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import { ref, onMounted, computed } from 'vue'
import { useRoute, useRouter } from "vue-router";
import store from "../../store/index.js"
import CustomInput from '../../components/Core/CustomInput.vue';
import { Select } from 'primevue';
const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const review = ref({
    id: null,
    reviewer: '',
    tour_id: '',
    title: '',
    content: '',
})

const errors = ref({
    reviewer: [],
    tour_id: [],
    title: [],
    content: [],

})
const tours = ref('')

function onSubmit($event, close = false) {
    loading.value = true
    if (review.value.id) {
        store.dispatch('updateReview', review.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    store.commit('showToast', 'Review has  successfully updated')
                    store.dispatch('getReviews')
                    if (close) {
                        router.push({ name: 'app.reviews' })
                    }
                }
            })
    } else {
        store.dispatch('createReview', review.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    store.commit('showToast', 'Review has  successfully created')
                    store.dispatch('getReviews')
                    if (close) {
                        router.push({ name: 'app.reviews' })
                    } else {
                        review.value = response.data
                        router.push({ name: 'app.reviews.edit', params: { id: response.data.id } })
                    }
                }
            })
            .catch(err => {
                loading.value = false;
                if (err.response.status === 422) {
                    errors.value = err.response.data.errors
                } else if (err.response.status === 409) {
                    store.commit('showErrorToast', err.response.data.message)
                }
            })
    }
}

onMounted(() => {

    loading.value = true
    if (route.params.id) {
        Promise.all([
            store.dispatch('getReview', route.params.id),
            store.dispatch('getProducts', { perPage: 9999 }) //by default it will get tours with locale en
        ])
            .then(([reviewResponse, productsResponse]) => {
                review.value = reviewResponse.data;
                tours.value = store.state.products.data;
            })
            .catch((error) => {
                console.error('An error occurred:', error);
            })
            .finally(() => {
                loading.value = false;
            });
    } else {
        store.dispatch('getProducts', { perPage: 9999 }).then(() => {
            tours.value = store.state.products.data;
            loading.value = false
        })
    }

})
</script>
