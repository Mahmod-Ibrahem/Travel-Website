<template>
    <!-- Comment-->
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16 min-h-full ">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div v-if="!Orders.loading"
             class="mx-auto max-w-7xl">
                <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">My orders</h2>
                </div>
                <div class="mt-6 flow-root sm:mt-8 ">
                    <div v-if="Orders.data" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div v-for="order in Orders.data"
                        class="flex flex-wrap items-center gap-y-4 py-6">
                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline">#{{ order.id }}</a>
                                </dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{order.created_at}}</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">${{ order.total_price }}</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Item Count</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ order.number_of_items }}</dd>
                            </dl>

                            <!-- <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                <Status :status="order.status"></Status>
                            </dl> -->
                            <!--lg:items-center lg:justify-end-->
                            <div
                                class="w-full grid sm:grid-cols-2 lg:flex lg:w-64  gap-4">
                                <!-- <button type="button"
                                    class="w-full rounded-lg bg-primary-700 px-3 py-2 text-sm font-medium text-white
                                     hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600
                                     dark:hover:bg-primary-700 dark:focus:ring-primary-800 lg:w-auto">
                                    </button> -->
                                    <RouterLink :to="{ name: 'myorder.view', params: { id: order.id } }">
                                        <p
                                    class="w-full inline-flex justify-center rounded-lg  border border-gray-200
                                     bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100
                                      hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4
                                      focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800
                                       dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white
                                        dark:focus:ring-gray-700 lg:w-auto cursor-pointer">View
                                    details</p>
                                </RouterLink>
                            </div>

                        </div>
                    </div>
                    <div v-else class=" text-center rounded-lg border p-4 shadow-sm border-gray-700 bg-gray-800
                            md:p-6 text-white">
                        Your Dont have Any Orders Yet! </div>
                </div>
            </div>
            <div class="h-[75vh] md:h-[50vh] flex items-center justify-center" v-else>
                <ImageSpinner></ImageSpinner>
            </div>
        </div>
    </section>
    <!--            <div class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
              <button type="button" class="w-full rounded-lg border border-red-700 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900 lg:w-auto">Cancel order</button>
              <a href="#" class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">View details</a>
            </div>-->
</template>

<script setup>
import InProgress from '../../core/Status/InProgress.vue';
import Paid from '../../core/Status/Paid.vue';
import Unpaid from '../../core/Status/Unpaid.vue';
import Cancelled from '../../core/Status/Cancelled.vue';
import ImageSpinner from "../../animation/image-spinner.vue"
import { computed, onMounted } from 'vue';
import store from "../../../store"
import Status from '../../core/Status/Status.vue';
import { RouterLink, useRoute } from 'vue-router';

const Orders=computed(()=>store.state.guestOrders)
onMounted(()=>{
    store.dispatch('guestOrders')
})
</script>
