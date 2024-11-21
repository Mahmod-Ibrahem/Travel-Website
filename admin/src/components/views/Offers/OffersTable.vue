<template>
    <div class="managmenet_container">
        <table class="table-auto w-full">
            <thead>
                <tr>

                    <TableHeaderCell field="name" :sort-field="sortField" :sort-direction="sortDirection"
                      >
                        Name
                    </TableHeaderCell>
                    <TableHeaderCell field="name" :sort-field="sortField" :sort-direction="sortDirection"
                    >
                        Description
                    </TableHeaderCell>
                    <TableHeaderCell field="startDate" :sort-field="sortField" :sort-direction="sortDirection">
                       Price
                    </TableHeaderCell>
                    <TableHeaderCell field="endDate" :sort-field="sortField" :sort-direction="sortDirection">
                       Image
                    </TableHeaderCell>
                    <TableHeaderCell field="Percentage" :sort-field="sortField" :sort-direction="sortDirection">
                        Start Date
                    </TableHeaderCell>
                    <TableHeaderCell field="Percentage" :sort-field="sortField" :sort-direction="sortDirection">
                        End Date
                    </TableHeaderCell>
                    <TableHeaderCell field="actions">
                        Actions
                    </TableHeaderCell>
                </tr>
            </thead>
            <tbody v-if="offers.loading || !offers.data">
                <tr>
                    <td colspan="6">
                        <Spinner v-if="offers.loading" />
                        <p v-else class="text-center py-8 text-gray-700">
                            There are no offers
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody class="text-center" v-else>
                <tr v-for="(offer) of offers.data">
                    <td class="border-b p-2 ">
                        {{ offer.offer_name }}
                    </td>
                    <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis ">
                        {{ offer.description }}
                    </td>
                    <td class="border-b p-2">
                        {{ offer.price }}
                    </td>
                     <td class="border-b p-2 flex item-center justify-center ">
                        <img class="w-16 h-16 object-cover" :src="offer.image_url" :alt="offer.title">
                    </td>
                    <td class="border-b p-2">
                        {{ offer.startDate ?? 'UNLIMITED' }}
                    </td>
                    <td class="border-b p-2">
                        {{ offer.endDate ?? 'UNLIMITED'     }}
                    </td>
                    <td class="border-b p-2 ">
                        <Menu as="div" class="relative inline-block text-left">
                            <div>
                                <MenuButton
                                    class="inline-flex items-center   justify-center rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5 focus:bg-opacity-5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
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
                                        <button :class="[
                                            active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                            'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                        ]" @click="editOffer(offer)">
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                aria-hidden="true" />
                                            Edit
                                        </button>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                        <button :class="[
                                            active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                            'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                        ]" @click="deleteOffer(offer)">
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
</template>

<script setup>
import {computed, ref} from "vue";
import store from "../../../store"
import Spinner from "../../core/Spinner.vue"
import TableHeaderCell from '../../core/Table/TableHeadingCell.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { EllipsisVerticalIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'
const offers = computed(() => store.state.offers);
const sortField = ref('updated_at');
const sortDirection = ref('desc')
// const showUserModal = ref(false);

const emit = defineEmits(['clickEdit'])




function deleteOffer(offer) {
    if (!confirm(`Are you sure you want to delete the offer?`)) {
        return
    }
    store.dispatch('deleteOffer',offer.id)
        .then(() => {
            store.commit('showToast','offer Deleted Successfully')
            store.dispatch('getOffers')
        })
}

function editOffer(p) {
    emit('clickEdit', p)
}

// onMounted(()=>{
//     store.dispatch('getPanelOffers')
// })
</script>

<style scoped></style>
