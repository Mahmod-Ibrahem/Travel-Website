<template>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-slate-50 to-gray-50 border-b border-gray-100 p-5">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-indigo-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Tours Management</h2>
                        <p class="text-sm text-gray-500">{{ products.total }} tours found</p>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <!-- Per Page Select -->
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-500">Show</span>
                        <select @change="getProducts(null)" v-model="perPage"
                            class="appearance-none bg-white px-3 py-2 pr-8 border border-gray-200 text-gray-700 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent cursor-pointer hover:border-gray-300 transition-colors">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>

                    <!-- Search Input -->
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input v-model="search" @change="getProducts(null)"
                            class="pl-9 pr-4 py-2 w-48 border border-gray-200 text-gray-700 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent hover:border-gray-300 transition-colors"
                            placeholder="Search tours...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50">
                        <TableHeadingCell @click="sortProduct"
                            class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="Id" :sort-field="sortField" :sort-direction="sortDirection">
                            ID
                        </TableHeadingCell>
                        <TableHeadingCell @click="sortProduct"
                            class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="group" :sort-field="sortField" :sort-direction="sortDirection">
                            Group
                        </TableHeadingCell>
                        <TableHeadingCell @click="sortProduct"
                            class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="Preference" :sort-field="sortField" :sort-direction="sortDirection">
                            Preference
                        </TableHeadingCell>
                        <TableHeadingCell @click="sortProduct"
                            class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="title" :sort-field="sortField" :sort-direction="sortDirection">
                            Title
                        </TableHeadingCell>
                        <TableHeadingCell
                            class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="Tour Cover" :sort-field="sortField" :sort-direction="sortDirection">
                            Cover
                        </TableHeadingCell>
                        <TableHeadingCell @click="sortProduct"
                            class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="price" :sort-field="sortField" :sort-direction="sortDirection">
                            Pricing
                        </TableHeadingCell>
                        <TableHeadingCell @click="sortProduct"
                            class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="duration" :sort-field="sortField" :sort-direction="sortDirection">
                            Duration
                        </TableHeadingCell>
                        <TableHeadingCell
                            class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider"
                            field="Not Sorted">
                            Actions
                        </TableHeadingCell>
                    </tr>
                </thead>
                <tbody v-if="productloading">
                    <tr>
                        <td colspan="8" class="px-4 py-12">
                            <Spinner class="mx-auto"></Spinner>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else class="divide-y divide-gray-100">
                    <tr v-for="(product, index) of products.data" :key="product.id"
                        class="hover:bg-indigo-50/30 transition-colors">
                        <!-- ID -->
                        <td class="px-4 py-4">
                            <span class="text-sm font-medium text-gray-900">#{{ product.id }}</span>
                        </td>

                        <!-- Group Badge -->
                        <td class="px-4 py-4">
                            <span :class="[
                                'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium',
                                product.group === 'day-tours'
                                    ? 'bg-blue-100 text-blue-700'
                                    : 'bg-purple-100 text-purple-700'
                            ]">
                                {{ product.group === 'day-tours' ? 'Day Tour' : 'Package' }}
                            </span>
                        </td>

                        <!-- Preference Badge -->
                        <td class="px-4 py-4">
                            <span v-if="product.preference"
                                class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                {{ product.preference }}
                            </span>
                            <span v-else class="text-sm text-gray-400">-</span>
                        </td>

                        <!-- Title -->
                        <td class="px-4 py-4 max-w-[200px]">
                            <p class="text-sm font-medium text-gray-900 truncate" :title="product.title">
                                {{ product.title }}
                            </p>
                        </td>

                        <!-- Tour Cover -->
                        <td class="px-4 py-4">
                            <div class="relative group">
                                <img class="w-14 h-14 object-cover rounded-lg shadow-sm ring-1 ring-gray-200 group-hover:ring-indigo-300 transition-all"
                                    :src="product.tour_cover" :alt="product.title">
                            </div>
                        </td>

                        <!-- Pricing -->
                        <td class="px-4 py-4">
                            <div class="flex flex-col gap-0.5">
                                <span class="text-sm font-semibold text-gray-900">${{ product.price_per_person }}</span>
                                <span class="text-xs text-gray-500">2-5: ${{ product.price_two_five }}</span>
                                <span class="text-xs text-gray-500">6-12: ${{ product.price_six_twenty }}</span>
                            </div>
                        </td>

                        <!-- Duration -->
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1 text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ product.duration }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-4 text-center">
                            <Menu as="div" class="relative inline-block text-left">
                                <MenuButton
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                                    <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true" />
                                </MenuButton>

                                <transition enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0">
                                    <MenuItems
                                        class="absolute z-20 right-0 mt-2 w-36 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black/5 focus:outline-none overflow-hidden">
                                        <div class="py-1">
                                            <MenuItem v-slot="{ active }">
                                            <RouterLink :to="{ name: 'app.products.edit', params: { id: product.id } }"
                                                :class="[
                                                    active ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700',
                                                    'group flex w-full items-center px-4 py-2.5 text-sm gap-3 transition-colors',
                                                ]">
                                                <PencilIcon class="h-4 w-4"
                                                    :class="active ? 'text-indigo-500' : 'text-gray-400'"
                                                    aria-hidden="true" />
                                                Edit
                                            </RouterLink>
                                            </MenuItem>
                                            <MenuItem v-slot="{ active }">
                                            <button :class="[
                                                active ? 'bg-red-50 text-red-600' : 'text-gray-700',
                                                'group flex w-full items-center px-4 py-2.5 text-sm gap-3 transition-colors',
                                            ]" @click="deleteProduct(product)">
                                                <TrashIcon class="h-4 w-4"
                                                    :class="active ? 'text-red-500' : 'text-gray-400'"
                                                    aria-hidden="true" />
                                                Delete
                                            </button>
                                            </MenuItem>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        <div v-if="!products.loading" class="bg-gray-50/50 border-t border-gray-100 px-5 py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <p class="text-sm text-gray-600">
                    Showing <span class="font-medium text-gray-900">{{ products.from }}</span> to
                    <span class="font-medium text-gray-900">{{ products.to }}</span> of
                    <span class="font-medium text-gray-900">{{ products.total }}</span> results
                </p>

                <nav v-if="products.total > products.limit" class="flex items-center gap-1" aria-label="pagination">
                    <a v-for="(link, i) of products.links" :key="i" :disabled="!link.url" href="#"
                        @click.prevent="getForPage($event, link)" aria-current="page"
                        class="relative inline-flex items-center justify-center min-w-[36px] h-9 px-3 text-sm font-medium rounded-lg transition-colors"
                        :class="[
                            link.active
                                ? 'bg-indigo-600 text-white shadow-sm'
                                : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200',
                            !link.url ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'
                        ]" v-html="link.label">
                    </a>
                </nav>
            </div>
        </div>
    </div>
</template>

<script setup>
import Spinner from "../../components/Core/Spinner.vue";
import TableHeadingCell from "../../components/Core/Table/TableHeadingCell.vue";
import { ref, computed, onMounted } from 'vue';
import store from "../../store";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { EllipsisVerticalIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'
import { RouterLink } from "vue-router";

const emit = defineEmits(['clickEdit'])

const perPage = ref(10)
const search = ref('')
const sortField = ref('')
const sortDirection = ref('asc')
const products = computed(() => store.state.products)
const productloading = ref('true')

function getProducts(url = null) {
    productloading.value = true
    store.dispatch('getProducts', {
        url,
        search: search.value,
        perPage: perPage.value,
        sortField: sortField.value,
        sortDirection: sortDirection.value,
        locale: 'en'
    }).then(() => {
        productloading.value = false
    })
}

function getForPage(ev, link) {
    if (!link.url || link.active) {
        return
    }
    getProducts(link.url)
}

function sortProduct(field) {
    if (field === sortField.value) {
        sortDirection.value = sortDirection.value === 'desc' ? 'asc' : 'desc'
    } else {
        sortField.value = field;
        sortDirection.value = 'asc'
    }
    getProducts()
}

function editProduct(product) {
    emit('clickEdit', product)
}

function deleteProduct(product) {
    if (!confirm('Are you sure you want to delete this tour?')) {
        return
    }
    store.dispatch('deleteProduct', product.id)
        .then(res => {
            store.commit('showToast', 'Tour deleted successfully')
            store.dispatch('getProducts')
        })
}

onMounted(() => {
    getProducts()
})
</script>
