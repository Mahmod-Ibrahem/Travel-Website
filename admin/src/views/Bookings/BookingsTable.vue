<template>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div
            class="p-4 border-b border-slate-200 bg-slate-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <span class="text-sm text-slate-500">Found <span class="font-semibold text-slate-900">{{ bookings.total
                    || 0
                        }}</span> bookings</span>
            </div>

            <div class="relative">
                <input v-model="search" @input="filterBookings"
                    class="pl-10 pr-4 py-2 border border-slate-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-64"
                    placeholder="Search bookings...">
                <svg class="w-5 h-5 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-600 uppercase text-xs font-semibold">
                    <tr>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="id">
                            ID
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="name">
                            Guest Name
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="email">
                            Email
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="phone">
                            Phone
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="date">
                            Date
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="adults">
                            Guests
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="total_price">
                            Price
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200 text-right" field="action">
                            Actions
                        </TableHeadingCell>
                    </tr>
                </thead>
                <tbody v-if="bookingsLoading">
                    <tr>
                        <td colspan="8">
                            <Spinner class="my-4"></Spinner>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else class="divide-y divide-slate-200">
                    <tr v-for="(booking, index) of filteredBookings" :key="booking.id"
                        class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 font-medium">#{{ booking.id }}</td>
                        <td class="px-6 py-4 text-sm text-slate-800 font-medium">{{ booking.name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ booking.email }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ booking.phone }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ formatDate(booking.date) }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ booking.adult }}
                            </span>
                            <span v-if="booking.children > 0" class="inline-flex items-center gap-1 ml-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                {{ booking.children }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-800 font-semibold">${{ booking.total_price }}</td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex space-x-2">
                                <RouterLink :to="{ name: 'app.bookings.edit', params: { id: booking.id } }"
                                    class="inline-flex items-center p-2 rounded-full hover:bg-gray-200">
                                    <EyeIcon class="h-5 w-5 text-indigo-500" aria-hidden="true" />
                                    <span class="sr-only">View</span>
                                </RouterLink>

                                <button @click="deleteBookingItem(booking.id)"
                                    class="inline-flex items-center p-2 rounded-full hover:bg-gray-200">
                                    <TrashIcon class="h-5 w-5 text-red-500" aria-hidden="true" />
                                    <span class="sr-only">Delete</span>
                                </button>
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div v-if="bookings.links && bookings.links.length > 3"
            class="px-6 py-4 border-t border-slate-200 bg-slate-50/50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-slate-600">
                    Showing <span class="font-medium">{{ bookings.from }}</span> to <span class="font-medium">{{
                        bookings.to
                        }}</span> of <span class="font-medium">{{ bookings.total }}</span> results
                </div>
                <div class="flex gap-1">
                    <a v-for="(link, index) in bookings.links" :key="index" @click.prevent="getBookingsPage(link.url)"
                        :class="[
                            'px-3 py-1 text-sm rounded-md transition-colors cursor-pointer',
                            link.active
                                ? 'bg-indigo-600 text-white font-medium'
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'
                        ]" v-html="link.label"></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Spinner from "../../components/Core/Spinner.vue";
import TableHeadingCell from "../../components/Core/Table/TableHeadingCell.vue";
import { ref, computed, onMounted } from 'vue';
import store from "../../store";
import { EyeIcon, TrashIcon } from '@heroicons/vue/24/outline'
import { RouterLink } from "vue-router";


const emit = defineEmits(['clickEdit'])

const search = ref('')

const bookings = computed(() => {
    return store.state.bookings
})
const bookingsLoading = ref(true)

const filteredBookings = computed(() => {
    if (!bookings.value.data) return []
    if (!search.value) return bookings.value.data

    return bookings.value.data.filter(booking =>
        booking.name.toLowerCase().includes(search.value.toLowerCase()) ||
        booking.email.toLowerCase().includes(search.value.toLowerCase()) ||
        booking.phone.toLowerCase().includes(search.value.toLowerCase())
    )
})

function filterBookings() {
    // Reactive filtering handled by computed property
}

function getBookingsPage(url) {
    if (!url) return
    store.dispatch('getBookings', { url }).then(() => {
        bookingsLoading.value = false
    })
}

function getBookingsData(url = null) {
    store.dispatch('getBookings', { url }).then(() => {
        bookingsLoading.value = false
    })
}

function deleteBookingItem(id) {
    if (!confirm('Are you sure you want to delete this booking?')) {
        return
    }
    store.dispatch('deleteBooking', id)
        .then(res => {
            store.commit('showToast', 'Booking deleted successfully')
            store.dispatch('getBookings')
        })
}

function formatDate(date) {
    if (!date) return '-'
    return new Date(date).toLocaleDateString()
}

onMounted(() => {
    getBookingsData()
})

</script>
