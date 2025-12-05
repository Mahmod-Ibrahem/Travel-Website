<template>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div
            class="p-4 border-b border-slate-200 bg-slate-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium text-slate-600">Show</span>
                    <select @change="getFaqs(null)" v-model="perPage"
                        class="form-select text-sm border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <span class="text-sm text-slate-500">Found <span class="font-semibold text-slate-900">{{ Faqs.total
                        }}</span> FAQs</span>
            </div>

            <div class="relative">
                <input v-model="search" @change="getFaqs(null)"
                    class="pl-10 pr-4 py-2 border border-slate-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-64"
                    placeholder="Search FAQs...">
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
                        <TableHeadingCell @click="sortProduct" class="px-6 py-4 border-b border-slate-200" field="id"
                            :sort-field="sortField" :sort-direction="sortDirection">
                            ID
                        </TableHeadingCell>
                        <TableHeadingCell @click="sortProduct" class="px-6 py-4 border-b border-slate-200"
                            field="question" :sort-field="sortField" :sort-direction="sortDirection">
                            Question
                        </TableHeadingCell>
                        <TableHeadingCell @click="sortProduct" class="px-6 py-4 border-b border-slate-200"
                            field="answer" :sort-field="sortField" :sort-direction="sortDirection">
                            Answer
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200 text-right" field="action">
                            Action
                        </TableHeadingCell>
                    </tr>
                </thead>
                <tbody v-if="faqloading">
                    <tr>
                        <td colspan="4">
                            <Spinner class="my-4"></Spinner>

                        </td>
                    </tr>
                </tbody>
                <tbody v-else class="divide-y divide-slate-200">
                    <tr v-for="(faq, index) of Faqs.data" :key="faq.id" class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 font-medium">#{{ faq.id }}</td>
                        <td class="px-6 py-4 text-sm text-slate-800 font-medium max-w-[200px] truncate"
                            :title="faq.question">
                            {{ faq.question }}
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500 max-w-[300px] truncate" :title="faq.answer">
                            {{ faq.answer }}
                        </td>

                        <td class="px-6 py-4 text-right">
                            <Menu as="div" class="relative inline-block text-left">
                                <div>
                                    <MenuButton
                                        class="inline-flex items-center justify-center  rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5 focus:bg-opacity-5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
                                        <EllipsisVerticalIcon class="h-5 w-5 text-indigo-500" aria-hidden="true" />
                                    </MenuButton>
                                </div>

                                <transition enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0">
                                    <MenuItems
                                        class="absolute z-10 right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <div class="px-1 py-1">
                                            <MenuItem v-slot="{ active }">
                                            <RouterLink :to="{ name: 'app.faq.edit', params: { id: faq.id } }" :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]">
                                                <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                    aria-hidden="true" />
                                                Edit
                                            </RouterLink>
                                            </MenuItem>
                                            <MenuItem v-slot="{ active }">
                                            <button :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]" @click="deleteFaq(faq.id)">
                                                <TrashIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
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
        <div v-if="!Faqs.loading"
            class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="text-sm text-slate-500">Showing {{ Faqs.from }} to {{ Faqs.to }} of {{ Faqs.total }}
                results</span>
            <nav v-if="Faqs.total > Faqs.limit" class="inline-flex rounded-md shadow-sm isolate"
                aria-label="pagination">
                <a v-for="(link, i) of Faqs.links" :key="i" href="#" @click.prevent="getForPage($event, link)"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium border focus:z-20 transition-colors"
                    :class="[
                        link.active
                            ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                            : 'bg-white border-slate-300 text-slate-500 hover:bg-slate-50',
                        i === 0 ? 'rounded-l-md' : '',
                        i === Faqs.links.length - 1 ? 'rounded-r-md' : '',
                        !link.url ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'
                    ]" v-html="link.label">
                </a>
            </nav>
        </div>
    </div>
</template>

<script setup>
import Spinner from "../../components/Core/Spinner.vue";
import TableHeadingCell from "../../components/Core/Table/TableHeadingCell.vue";
import { ref, computed, onMounted } from 'vue';
import store from "../../store";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { EllipsisVerticalIcon, PencilIcon, TrashIcon, ChevronDoubleRightIcon } from '@heroicons/vue/24/outline'
import { RouterLink } from "vue-router";


const emit = defineEmits(['clickEdit'])

const perPage = ref(10)

const search = ref('')

const sortField = ref('')
const sortDirection = ref('asc')
const Faqs = computed(() => {
    return store.state.faqs
})
const faqloading = ref('true')


function getFaqs(url = null) {
    faqloading.value = true
    store.dispatch('getFaqs', {
        url,
        search: search.value,
        perPage: perPage.value,
        sortField: sortField.value,
        sortDirection: sortDirection.value
    }).then(() => {
        faqloading.value = false
    })
}

function getForPage(ev, link) {
    if (!link.url || link.active) {
        return
    }
    getFaqs(link.url)
}

function sortProduct(field) {
    if (field === sortField.value) {
        if (sortDirection.value === 'desc') {
            sortDirection.value = 'asc'
        } else {
            sortDirection.value = 'desc'
        }
    } else {
        sortField.value = field;
        sortDirection.value = 'asc'
    }

    getFaqs()
}

function editProduct(product) {
    emit('clickEdit', product)
}

function deleteFaq(id) {
    if (!confirm('Are You Sure you want to delete the Faq ? ')) {
        return
    }
    store.dispatch('deleteFaq', id)
        .then(res => {
            store.commit('showToast', 'Faq Deleted Successfully')
            store.dispatch('getFaqs')
        })
}

onMounted(() => {

    getFaqs()

})

</script>
