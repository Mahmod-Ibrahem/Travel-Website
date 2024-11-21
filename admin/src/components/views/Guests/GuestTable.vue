<template>
  <div class="managmenet_container">
    <div class="flex justify-between border-b-2 pb-3">
      <div class="flex items-center">
        <span class="whitespace-nowrap mr-3">Per Page</span>
        <select @change="getGuests(null)" v-model="perPage"
                class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        <span class="ml-3">Found {{guests.total}} Guests</span>
      </div>
      <div>
        <input v-model="search" @change="getGuests(null)"
               class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
               placeholder="Type to Search Guests">
      </div>
    </div>

    <table class="table_tag">
      <thead>
      <tr>
        <TableHeaderCell field="id" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortGuests('id')">
          ID
        </TableHeaderCell>
        <TableHeaderCell field="name" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortGuests('name')">
          Name
        </TableHeaderCell>
        <TableHeaderCell field="email" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortGuests('email')">
          Email
        </TableHeaderCell>
        <TableHeaderCell field="room" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortGuests('room')">
          Room
        </TableHeaderCell>
        <TableHeaderCell field="created_by" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortGuests('created_by')">
           BY
        </TableHeaderCell>
        <TableHeaderCell field="room" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortGuests('status')">
          Status
        </TableHeaderCell>
        <TableHeaderCell field="actions">
          Actions
        </TableHeaderCell>
      </tr>
      </thead>
      <tbody v-if="guests.loading || !guests.data.length">
      <tr>
        <td colspan="6">
          <Spinner v-if="guests.loading"/>
          <p v-else class="text-center py-8 text-gray-700">
            There are no Guests
          </p>
        </td>
      </tr>
      </tbody>
      <tbody v-else class="table-body">
      <tr v-for="(guest, index) of guests.data">
        <td class="border-b p-2 ">{{ guest.user_id }}</td>
        <td class="border-b p-2 ">
         {{ guest.name }}
        </td>
        <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
          {{ guest.email }}
        </td>
        <td class="border-b p-2">
          {{ guest.room }}
        </td>
        <td class="border-b p-2">
          {{ guest.created_by }}
        </td>
        <td class="border-b p-2">
            {{ guest.status ? 'active' : 'disabled' }}
        </td>
        <td class="border-b p-2 ">
          <Menu as="div" class="relative inline-block text-left">
            <div>
              <MenuButton
                class="inline-flex items-center   justify-center rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5 focus:bg-opacity-5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
              >
                <EllipsisVerticalIcon
                  class="h-5 w-5 text-indigo-500"
                  aria-hidden="true"/>
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
                  <MenuItem v-slot="{ active }">
                    <button
                      :class="[
                        active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                      ]"
                      @click="editguest(guest)"
                    >
                      <PencilIcon
                        :active="active"
                        class="mr-2 h-5 w-5 text-indigo-400"
                        aria-hidden="true"
                      />
                      Edit
                    </button>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <button
                      :class="[
                        active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                      ]"
                      @click="deleteguest(guest)"
                    >
                      <TrashIcon
                        :active="active"
                        class="mr-2 h-5 w-5 text-indigo-400"
                        aria-hidden="true"
                      />
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

    <div v-if="!guests.loading" class="flex justify-between items-center mt-5">
      <div v-if="guests.data.length">
        Showing from {{ guests.from }} to {{ guests.to }}
      </div>
      <nav
        v-if="guests.total > guests.limit"
        class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
        aria-label="Pagination"
      >
        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        <a
          v-for="(link, i) of guests.links"
          :key="i"
          :disabled="!link.url"
          href="#"
          @click="getForPage($event, link)"
          aria-current="page"
          class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
          :class="[
              link.active
                ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === guests.links.length - 1 ? 'rounded-r-md' : '',
              !link.url ? ' bg-gray-100 text-gray-700': ''
            ]"
          v-html="link.label"
        >
        </a>
      </nav>
    </div>
  </div>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../../store"
import Spinner from "../../core/Spinner.vue"
import {GUESTS_PER_PAGE} from "../../../constants";
import TableHeaderCell from '../../core/Table/TableHeadingCell.vue'
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {EllipsisVerticalIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/outline'

const perPage = ref(GUESTS_PER_PAGE);
const search = ref('');
const guests = computed(() => store.state.guests);
const sortField = ref('updated_at');
const sortDirection = ref('desc')
const showguestModal = ref(false);

const emit = defineEmits(['clickEdit'])

onMounted(() => {
  getGuests();
})

function getForPage(ev, link) {
  ev.preventDefault();
  if (!link.url || link.active) {
    return;
  }

  getGuests(link.url)
}

function getGuests(url = null) {
    guests.value.loading=true
  store.dispatch("getGuests", {
    url,
    search: search.value,
    per_page: perPage.value,
    sort_field: sortField.value,
    sort_direction: sortDirection.value
  }).then(()=>{
    guests.value.loading=false
  });
}

function sortGuests(field) {
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

  getGuests()
}

function showAddNewModal() {
  showguestModal.value = true
}

function deleteguest(guest) {
  if (!confirm(`Are you sure you want to delete the guest?`)) {
    return
  }
  store.dispatch('deleteGuest', guest.user_id)
    .then(res => {
      // TODO Show notification
      store.dispatch('getGuests')
    })
}

function editguest(p) {
  emit('clickEdit', p)
}
</script>

<style scoped>

</style>
