<template>
  <div class="managmenet_container">
    <div class="flex flex-col  border-b-2 p-4">
            <div class="flex  justify-between items-center">
                <div class="flex  flex-wrap items-center">
                    <span class="whitespace-nowrap mr-3 font-semibold">Per Page</span>
                    <select @change="getOrders(null)" v-model="perPage"
                        class="appearance-none relative block  px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900
                     rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <input v-model="search" @change="getOrders(null)"
                class="relative block max-w-[5rem] md:max-w-fit  px-3 py-2 border border-gray-300 placeholder-gray-500
                text-gray-900 rounded-md
                     focus:outline-none
                     focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder="Search">
            </div>
                <span class="mt-4 font-semibold">Found {{ orders.total }} Orders</span>
        </div>




    <table class="table-auto w-full overflow-x-auto border-r-2 border-l-2">

      <thead>
<tr>
        <TableHeaderCell field="id" :sort-field="sortField" :sort-direction="sortDirection" @click="sortOrders('id')">
          ID
        </TableHeaderCell>
        <TableHeaderCell field="customer.first_name" :sort-field="sortField" :sort-direction="sortDirection" @click="sortOrders('customer.first_name')" >
          Customer
        </TableHeaderCell>
        <TableHeaderCell field="room" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortOrders('room')">
          Room
        </TableHeaderCell>
        <TableHeaderCell field="total_price" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortOrders('total_price')">
          Price
        </TableHeaderCell>
        <TableHeaderCell field="created_at" :sort-field="sortField" :sort-direction="sortDirection"
                         @click="sortOrders('created_at')">
          Date
        </TableHeaderCell>
        <!-- <TableHeaderCell field="orderDetail">
          Details
        </TableHeaderCell> -->
        <TableHeaderCell field="Bill">
            Receipts
        </TableHeaderCell>
    <TableHeaderCell field="Actions">
        Actions
    </TableHeaderCell>
      </tr>
      </thead>
      <tbody v-if="orders.loading || !orders.data.length">
      <tr>
        <td colspan="6">
          <Spinner v-if="orders.loading"/>
          <p v-else class="text-center py-8 text-gray-700">
            There are no orders
          </p>
        </td>
      </tr>
      </tbody>
      <tbody v-else class="table-body">

      <tr v-for="(order) of orders.data" :class="[order.deleted_At !== null ?  'line-through decoration-red-600' : '']">

        <td class="border-b p-2  ">{{ order.id }}</td>
        <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis ">
          {{ order.customer.first_name }}
        </td>
        <td class="border-b p-2  ">
          {{order.customer.room}}
        </td>
        <td class="border-b p-2  ">
          ${{ order.total_price }}
        </td>
        <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis  ">
          {{ order.created_at }}
        </td>


        <td class="border-b p-2 flex items-center justify-center ">
  <RouterLink :to="{name: 'app.orders.bill', params: {id: order.id}}">
    <EyeIcon class="w-6 h-6 font-semibold text-blue-800"></EyeIcon>
  </RouterLink>
</td>
          <td class="border-b p-2 ">
          <div class="flex justify-center items-center gap-3">
              <XCircleIcon class="w-6 h-6 font-semibold text-red-800 cursor-pointer hover:text-red-600 transition-all" @click="deleteOrder(order.id)"></XCircleIcon>
                  <ArrowPathIcon class="w-6 h-6 font-semibold text-green-800 cursor-pointer hover:text-green-600 transition-all" @click="restoreOrder(order.id)"></ArrowPathIcon>
          </div>
          </td>


      </tr>
      </tbody>
    </table>

    <div v-if="!orders.loading" class="flex justify-between items-center mt-5">
      <div v-if="orders.data.length">
        Showing from {{ orders.from }} to {{ orders.to }}
      </div>
      <nav
        v-if="orders.total > orders.limit"
        class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
        aria-label="Pagination"
      >
        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        <a
          v-for="(link, i) of orders.links"
          :key="i"
          :disabled="!link.url"
          @click="getForPage($event, link)"
          aria-current="page"
          class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
          :class="[
              link.active
                ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === orders.links.length - 1 ? 'rounded-r-md' : '',
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
import store from "../../../store";
import Spinner from "../../core/Spinner.vue";
import {PRODUCTS_PER_PAGE} from "../../../constants";
import TableHeaderCell from "../../core/Table/TableHeadingCell.vue"
import {EyeIcon, XCircleIcon,ArrowPathIcon} from '@heroicons/vue/24/outline'

const perPage = ref(PRODUCTS_PER_PAGE);
const search = ref('');
const orders = computed(() => store.state.orders);
const sortField = ref('updated_at');
const sortDirection = ref('desc')

const order = ref({})
const showOrderModal = ref(false);

const emit = defineEmits(['clickEdit'])

onMounted(() => {
  getOrders();
})

function getForPage(ev, link) {
  ev.preventDefault();
  if (!link.url || link.active) {
    return;
  }

  getOrders(link.url)
}

function getOrders(url = null) {
  store.dispatch("getOrders", {
    url,
    search: search.value,
    per_page: perPage.value,
    sort_field: sortField.value,
    sort_direction: sortDirection.value
  });
}

function sortOrders(field) {
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

  getOrders()
}

function deleteOrder(id) {
  if (confirm('Are you sure you want to delete this order?')) {
    store.dispatch('deleteOrder', id).then(() => {
        store.commit('showToast', 'Order Deleted Successfully')
        store.dispatch('getOrders')
    })
  }
}

function restoreOrder(id) {
  if (confirm('Are you sure you want to restore this order?')) {
    store.dispatch('restoreOrder', id).then(() => {
        store.commit('showToast', 'Order Restored Successfully')
        store.dispatch('getOrders')
    })
  }
}

function showOrder(p) {
  emit('clickShow', p)
}
</script>

<style scoped>

</style>
