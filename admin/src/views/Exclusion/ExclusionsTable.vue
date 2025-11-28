<template>
    <div class="managmenet_container">
        <div class="flex flex-col  border-b-2 p-2">
            <div class="flex  justify-between items-center">
                <div class="flex  flex-wrap items-center">
                    <span class="whitespace-nowrap mr-3 font-semibold">Per Page</span>
                    <select @change="getExclusions(null)" v-model="perPage"
                        class="appearance-none relative block  px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900
                     rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>
            <span class="mt-4">Found {{ exclusions.total || 0 }} exclusions</span>
        </div>
        <table class="table_tag">
            <thead>
                <tr>
                    <TableHeadingCell class="border-b-2 p-2 text-left " field="Id">
                        ID
                    </TableHeadingCell>

                    <TableHeadingCell class="border-b-2 p-2 text-left" field="title">
                        Title
                    </TableHeadingCell>

                    <TableHeadingCell class="border-b-2 p-2 text-left" field="Not Sorted">
                        Actions
                    </TableHeadingCell>
                </tr>
            </thead>
            <tbody v-if="exclusionloading">
                <tr>
                    <td colspan="3">
                        <Spinner class="my-4"></Spinner>

                    </td>
                </tr>
            </tbody>
            <tbody v-else class="table-body">
                <tr v-for="(exclusion, index) of exclusions.data">
                    <td class="border-b p-2 ">{{ exclusion.id }}</td>
                    <td class="border-b p-2">
                        {{ exclusion.title }}
                    </td>

                    <td class="border-b p-2 ">
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
                                        <RouterLink :to="{ name: 'app.exclusions.edit', params: { id: exclusion.id } }"
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
                                        ]" @click="deleteExclusion(exclusion)">
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
        <div v-if="!exclusionloading" class="justify-between items-center mt-5 md:flex p-3">
            <span>Showing From {{ exclusions.from || 0 }} to {{ exclusions.to || 0 }}</span>
            <nav v-if="exclusions.total > exclusions.per_page"
                class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px md:flex "
                aria-label="pagination">
                <a v-for="(link, i) of exclusions.links" :key="i" :disabled="!link.url" href="#"
                    @click.prevent="getForPage($event, link)" aria-current="page"
                    class="relative  items-center px-4 py-2 border text-sm font-medium whitespace-nowrap" :class="[
                        link.active
                            ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                            : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
                        i === 0 ? 'rounded-l-md' : '',
                        i === exclusions.links.length - 1 ? 'rounded-r-md' : '',
                        !link.url ? ' bg-gray-100 text-gray-700' : ''
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
import { EllipsisVerticalIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'
import { RouterLink } from "vue-router";



const emit = defineEmits(['clickEdit'])

const perPage = ref(20)

const exclusions = computed(() => {
    return store.state.exclusions
})
const exclusionloading = ref('true')


function getExclusions(url = null) {
    exclusionloading.value = true
    store.dispatch('getExclusions', {
        url,
        perPage: perPage.value
    }).then(() => {
        exclusionloading.value = false
    })
}

function getForPage(ev, link) {
    if (!link.url || link.active) {
        return
    }
    getExclusions(link.url)
}

function deleteExclusion(exclusion) {
    if (!confirm('Are You Sure you want to delete the exclusion ? ')) {
        return
    }
    store.dispatch('deleteExclusion', exclusion.id)
        .then(res => {
            store.commit('showToast', 'Exclusion Deleted Successfully')
            store.dispatch('getExclusions')
        })
}

onMounted(() => {

    getExclusions()

})


</script>
