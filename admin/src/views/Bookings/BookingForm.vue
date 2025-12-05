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
                    {{ booking.id ? `Update Booking` : 'View Booking' }}
                </h1>
            </div>
            <p v-if="booking.id && !loading" class="text-slate-500 ml-13">
                Booking ID: <span class="font-medium text-indigo-600">#{{ booking.id }}</span> - {{ booking.name }}
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
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Guest Information
                        </h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Full Name -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <CustomInput v-model="booking.name" :errors="errors.name"
                                    placeholder="Enter guest name" />
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <CustomInput v-model="booking.email" :errors="errors.email" type="email"
                                    placeholder="Enter email address" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Phone <span class="text-red-500">*</span>
                                </label>
                                <CustomInput v-model="booking.phone" :errors="errors.phone"
                                    placeholder="Enter phone number" />
                            </div>

                            <!-- Country -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Country <span class="text-red-500">*</span>
                                </label>
                                <CustomInput v-model="booking.country" :errors="errors.country"
                                    placeholder="Enter country" />
                            </div>

                            <!-- Adults -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Number of Adults <span class="text-red-500">*</span>
                                </label>
                                <CustomInput type="number" v-model.number="booking.adult" :errors="errors.adult"
                                    placeholder="0" min="0" />
                            </div>

                            <!-- Children -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Number of Children
                                </label>
                                <CustomInput type="number" v-model.number="booking.children" :errors="errors.children"
                                    placeholder="0" min="0" />
                            </div>

                            <!-- Total Price -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Total Price ($) <span class="text-red-500">*</span>
                                </label>
                                <CustomInput type="number" v-model.number="booking.total_price"
                                    :errors="errors.total_price" placeholder="0.00" step="0.01" min="0" />
                            </div>

                            <!-- Date -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Booking Date <span class="text-red-500">*</span>
                                </label>
                                <DatePicker v-model="booking.date" :errors="errors.date" dateFormat="yy-mm-dd"
                                    class="w-full" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tour Information Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mt-6">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tour Information
                        </h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tour Group -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Tour Group
                                </label>
                                <div class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-600">
                                    {{ booking.tour_group }}
                                </div>
                            </div>

                            <!-- Tour Title -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Tour Title
                                </label>
                                <div class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-600">
                                    {{ booking.tour_title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Footer -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 px-6 py-4 
                flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3 mt-6">
                    <RouterLink :to="{ name: 'app.bookings' }" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 
                    text-slate-600 hover:text-slate-800 hover:bg-slate-100 
                    rounded-xl transition-all duration-200 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel
                    </RouterLink>

                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 
                        px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 
                        hover:from-indigo-700 hover:to-indigo-800 text-white 
                        rounded-xl font-medium shadow-lg shadow-indigo-500/25 
                        transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Save Booking
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from "vue-router";
import store from "../../store/index.js"
import CustomInput from '../../components/Core/CustomInput.vue';
import { DatePicker } from 'primevue';
import { RouterLink } from "vue-router";

const route = useRoute()
const router = useRouter()

const loading = ref(false)
const booking = ref({
    id: null,
    tour_id: null,
    name: '',
    email: '',
    phone: '',
    country: '',
    adult: 0,
    children: 0,
    total_price: 0,
    date: null,
    tour_group: '',
    tour_title: '',
    tour_cover: '',
})

const errors = ref({})

function onSubmit() {
    loading.value = true;
    errors.value = {}

    store.dispatch('updateBooking', booking.value)
        .then(response => {
            loading.value = false;
            if (response.status === 200) {
                store.commit('showToast', 'Booking updated successfully');
                store.dispatch('getBookings');
                router.push({ name: 'app.bookings' });
            }
        })
        .catch(err => {
            loading.value = false;
            if (err.response?.status === 422) {
                errors.value = err.response.data.errors;
            } else {
                store.commit('showErrorToast', 'An error occurred while updating the booking.');
            }
        });
}

onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store.dispatch('getBooking', route.params.id)
            .then((response) => {
                loading.value = false;
                booking.value = response.data
            })
            .catch(() => {
                loading.value = false
                store.commit('showErrorToast', 'Failed to load booking')
                router.push({ name: 'app.bookings' })
            })
    }
})
</script>
