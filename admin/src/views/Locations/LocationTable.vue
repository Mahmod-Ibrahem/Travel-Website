<template>
    <div class="managmenet_container">
        <div class="flex flex-col  p-2"></div>

        <table class="table_tag">
            <thead class="bg-gray-50">
            <tr>
                <TableHeadingCell>
                    ID
                </TableHeadingCell>

                <TableHeadingCell field="name">
                    Name
                </TableHeadingCell>

                <TableHeadingCell field="image">
                    Image
                </TableHeadingCell>

                <TableHeadingCell field="Not Sorted">
                    Actions
                </TableHeadingCell>
            </tr>
            </thead>

            <tbody v-if="locationLoading">
            <tr>
                <td colspan="5">
                    <Spinner class="my-4"/>
                </td>
            </tr>
            </tbody>

            <tbody v-else class="table-body">
            <tr v-for="(location, index) in locations.data" :key="location.id">
                <td class="table-td">{{ location.id }}</td>

                <td class="table-td">
                    {{ location.name }}
                </td>

                <td class="table-td">
                    <img
                        class="w-16 h-16 object-cover"
                        :src="location.image_url"
                        :alt="location.name"
                    />
                </td>

                <td class="table-td">
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                            <MenuButton
                                class="inline-flex items-center justify-center rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5 focus:bg-opacity-5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                            >
                                <EllipsisVerticalIcon class="h-5 w-5 text-indigo-500" aria-hidden="true"/>
                            </MenuButton>
                        </div>

                        <transition
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        >
                            <MenuItems
                                class="absolute z-10 right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            >
                                <div class="px-1 py-1">
<!--                                    <MenuItem v-slot="{ active }">-->
<!--                                        <RouterLink-->
<!--                                            :to="{ name: 'app.locations.createTranslation', params: { id: location.id } }"-->
<!--                                            :class="[-->
<!--                          active ? 'bg-indigo-600 text-white' : 'text-gray-900',-->
<!--                          'group flex w-full items-center rounded-md px-2 py-2 text-sm',-->
<!--                        ]"-->
<!--                                        >-->
<!--                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"-->
<!--                                                        aria-hidden="true"/>-->
<!--                                            Translate-->
<!--                                        </RouterLink>-->
<!--                                    </MenuItem>-->

                                    <MenuItem v-slot="{ active }">
                                        <RouterLink
                                            :to="{ name: 'app.locations.edit', params: { id: location.id } }"
                                            :class="[
                          active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                          'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                        ]"
                                        >
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                        aria-hidden="true"/>
                                            Edit
                                        </RouterLink>
                                    </MenuItem>

                                    <MenuItem v-slot="{ active }">
                                        <button
                                            :class="[
                          active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                          'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                        ]"
                                            @click="deleteLocation(location)"
                                        >
                                            <TrashIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                       aria-hidden="true"/>
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
import Spinner from "../../components/Core/Spinner.vue";
import TableHeadingCell from "../../components/Core/Table/TableHeadingCell.vue";
import {ref, computed, onMounted} from "vue";
import store from "../../store";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {EllipsisVerticalIcon, PencilIcon, TrashIcon} from "@heroicons/vue/24/outline";
import {RouterLink} from "vue-router";

const emit = defineEmits(["clickEdit"]);

const locations = computed(() => store.state.locations);
const locationLoading = ref(true);

function getLocations(url = null) {
    store.dispatch("getLocations").then(() => {
        locationLoading.value = false;
    });
}

// function editLocation(location) {
//   emit('clickEdit', location)
// }

function deleteLocation(location) {
    if (!confirm("Are you sure you want to delete the location?")) {
        return;
    }
    store
        .dispatch("deleteLocation", location.id)
        .then(() => {
            store.commit("showToast", "Location deleted successfully");
            store.dispatch("getLocations");
        });
}

onMounted(() => {
    getLocations();
});
</script>
