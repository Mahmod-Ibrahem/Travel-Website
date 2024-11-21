<template>
    <div class="managmenet_container">
        <table class="table_tag">
            <thead>
                <tr>

                    <TableHeaderCell field="name" :sort-field="sortField" :sort-direction="sortDirection"
                      >
                        Type
                    </TableHeaderCell>
                    <TableHeaderCell field="startDate" :sort-field="sortField" :sort-direction="sortDirection">
                        Start Date
                    </TableHeaderCell>
                    <TableHeaderCell field="endDate" :sort-field="sortField" :sort-direction="sortDirection">
                        End Date
                    </TableHeaderCell>
                    <TableHeaderCell field="Percentage" :sort-field="sortField" :sort-direction="sortDirection">
                        Percentage
                    </TableHeaderCell>
                    <TableHeaderCell field="actions">
                        Actions
                    </TableHeaderCell>
                </tr>
            </thead>
            <tbody v-if="discounts.loading || !discounts.data.length">
                <tr>
                    <td colspan="6">
                        <Spinner v-if="discounts.loading" />
                        <p v-else class="text-center py-8 text-gray-700">
                            There are no discounts
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody class="table-body" v-else>
                <tr v-for="(discount) of discounts.data">
                    <td class="border-b p-2 ">
                        {{ discount.type }}
                    </td>
                    <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                        {{ discount.startDate }}
                    </td>
                    <td class="border-b p-2">
                        {{ discount.endDate }}
                    </td>
                    <td class="border-b p-2">
                        {{ discount.percentage }} %
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
                                        <MenuItem v-if="discount.type!='Overall Price'" v-slot="{ active }">
                                        <RouterLink :to="{name:'app.discounts.view',params:{id:discount.id}}" :class="[
                                            active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                            'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                        ]" >
                                            <ChevronDoubleRightIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                aria-hidden="true" />
                                            Apply
                                        </RouterLink>
                                        </MenuItem>

                                        <MenuItem v-slot="{ active }">
                                        <button :class="[
                                            active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                            'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                        ]" @click="editDiscount(discount)">
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                aria-hidden="true" />
                                            Edit
                                        </button>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                        <button :class="[
                                            active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                            'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                        ]" @click="deleteDiscount(discount)">
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
import { computed, ref } from "vue";
import store from "../../../store"
import Spinner from "../../core/Spinner.vue"
import TableHeaderCell from '../../core/Table/TableHeadingCell.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { ChevronDoubleRightIcon, EllipsisVerticalIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'
import { RouterLink } from "vue-router";

const discounts = computed(() => store.state.discounts);
const sortField = ref('updated_at');
const sortDirection = ref('desc')
// const showUserModal = ref(false);

const emit = defineEmits(['clickEdit'])


// function getDiscounts(url = null) {
//     store.dispatch("getDiscounts").then(() => {
//         discounts.value.loading = false
//     });
// }



// function showAddNewModal() {
//     showUserModal.value = true
// }

function deleteDiscount(discount) {
    if (!confirm(`Are you sure you want to delete the discount?`)) {
        return
    }
    store.dispatch('deleteDiscount',discount.id)
        .then(() => {
            store.commit('showToast','Discount Deleted Successfully')
            store.dispatch('getDiscounts')
        })
}

function editDiscount(p) {
    emit('clickEdit', p)
}
</script>

<style scoped></style>
