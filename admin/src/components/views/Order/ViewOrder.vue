<template>
    <!-- Comment-->
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16 min-h-full">
        <div v-if="!loading" class="mx-auto max-w-5xl p-4">
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order summary</h2>
<!--                <Status :status="Order.status"></Status>-->

            </div>
            <div class="mt-6 sm:mt-8">
                <div v-for="item in Order.order_items"
                    class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                    <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            <tr>
                                <td class=" py-4 md:w-[384px] whitespace-nowrap overflow-hidden text-ellipsis">
                                    <div class="flex items-center gap-4">
                                        <!-- <a href="#" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                            <img class="h-auto w-full max-h-full " :src=item.product.image
                                                alt="imac image" />
                                        </a> -->
                                        <p class="hover:underline ">{{ item.product.title }}</p>
                                    </div>
                                </td>

                                <td class="p-4 text-base font-normal text-gray-900 dark:text-white">X{{ item.quantity }}
                                </td>

                                <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">
                                    ${{ item.product.price * item.quantity *  (1-item.discount_percentage/100) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 space-y-6">

                    <div class="space-y-4">


                        <dl
                            class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">${{ Order.total_price }}
                            </dd>
                        </dl>
                    </div>


                    <div class="gap-4 sm:flex sm:items-center">

                        <RouterLink class="w-full rounded-lg  border border-gray-200 bg-white px-5  py-2.5 text-sm font-medium
                             text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none
                             focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400
                              dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 text-center"
                            :to="{ name: 'HomePage' }">
                            Return
                            to Shopping
                        </RouterLink>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-[75vh] md:h-[50vh] flex items-center justify-center" v-else>
            <ImageSpinner></ImageSpinner>
        </div>
    </section>

</template>

<script setup>
import ImageSpinner from "../../animation/image-spinner.vue"
import { computed, onMounted, ref } from 'vue';
import store from "../../../store"
import Status from '../../core/Status/Status.vue';
import { RouterLink, useRoute } from 'vue-router';
import router from "../../../router";
const loading = ref(true)
const route = useRoute()
const Order = ref({})
onMounted(() => {
    store.dispatch('viewGuestOrder', route.params.id).then(({ data }) => {
        loading.value = false
        Order.value = data
    }).catch((error)=>{
        if(error.response.status==401)
    {
        router.push({name:'unauthorized'})
    }
    })

})
</script>
