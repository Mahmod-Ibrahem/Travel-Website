<template>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div
            class="p-4 border-b border-slate-200 bg-slate-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <span class="text-sm text-slate-500">Found <span class="font-semibold text-slate-900">{{ settings.data ?
                    settings.data.length : 0
                        }}</span> settings</span>
            </div>

            <div class="relative">
                <input v-model="search" @input="filterSettings"
                    class="pl-10 pr-4 py-2 border border-slate-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-64"
                    placeholder="Search settings...">
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
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="key">
                            Key
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200" field="value">
                            Value
                        </TableHeadingCell>
                        <TableHeadingCell class="px-6 py-4 border-b border-slate-200 text-right" field="action">
                            Actions
                        </TableHeadingCell>
                    </tr>
                </thead>
                <tbody v-if="settingloading">
                    <tr>
                        <td colspan="4">
                            <Spinner class="my-4"></Spinner>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else class="divide-y divide-slate-200">
                    <tr v-for="(setting, index) of filteredSettings" :key="setting.id"
                        class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 font-medium">#{{ setting.id }}</td>
                        <td class="px-6 py-4 text-sm text-slate-800 font-mono max-w-[250px] truncate"
                            :title="setting.key">
                            {{ setting.key }}
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600 max-w-[300px] truncate" :title="setting.value">
                            {{ setting.value }}
                        </td>

                        <td class="px-6 py-4 text-right">
                            <Menu as="div" class="relative inline-block text-left">
                                <div>
                                    <MenuButton
                                        class="inline-flex items-center justify-center rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5 focus:bg-opacity-5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
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
                                            <RouterLink :to="{ name: 'app.settings.edit', params: { id: setting.id } }"
                                                :class="[
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
                                            ]" @click="deleteSetting(setting)">
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

const search = ref('')

const settings = computed(() => {
    return store.state.settings
})
const settingloading = ref('true')

const filteredSettings = computed(() => {
    if (!settings.value.data) return []
    if (!search.value) return settings.value.data

    return settings.value.data.filter(setting =>
        setting.key.toLowerCase().includes(search.value.toLowerCase()) ||
        setting.value.toLowerCase().includes(search.value.toLowerCase())
    )
})

function filterSettings() {
    // Reactive filtering handled by computed property
}

function getSettings(url = null) {
    store.dispatch('getSettings').then(() => {
        settingloading.value = false
    })
}

function deleteSetting(setting) {
    if (!confirm('Are You Sure you want to delete the setting ? ')) {
        return
    }
    store.dispatch('deleteSetting', setting.id)
        .then(res => {
            store.commit('showToast', 'Setting Deleted Successfully')
            store.dispatch('getSettings')
        })
}

onMounted(() => {

    getSettings()

})

</script>
