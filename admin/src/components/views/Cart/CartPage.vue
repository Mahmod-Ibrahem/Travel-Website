<template>
    <main class=" min-h-full  bg-gray-900 antialiased">
        <section class=" py-8   md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <h2 class="text-xl font-semibold text-white  sm:text-2xl">Shopping Cart</h2>
                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8" v-if="!cartLoading">
                    <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                        <div class="space-y-6">
                            <div v-for="(item, index) in cartItems" class="rounded-lg border   p-4 shadow-sm bg-gray-800 border-gray-700
                                 md:p-6">
                                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                    <!-- <img  class="h-20 w-20 " :src="categories.find(cat => cat.category === item.type)?.image_url" alt="imac image" /> -->
                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <div class="flex items-center">
                                            <button @click="changeItemQuantity(item, -1, index)" type="button" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border
                                                focus:outline-none focus:ring-2
                                               border-gray-600 bg-gray-700 hover:bg-gray-600
                                               focus:ring-gray-700">
                                                <svg class="h-2.5 w-2.5  text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium
                                                  focus:outline-none focus:ring-0 text-white" :value="item.quantity"
                                                required />
                                            <button type="button" @click="changeItemQuantity(item, 1)" class="inline-flex h-5 w-5 shrink-0 items-center justify-center
                                                 rounded-md border
                                                  focus:outline-none focus:ring-2  border-gray-600
                                                   bg-gray-700 hover:bg-gray-600 focus:ring-gray-700">
                                                <svg class="h-2.5 w-2.5  text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="text-end md:order-4 md:w-32">
                                            <p class="text-base font-bold text-white">${{
                                                item.total_price.toLocaleString('en-US', {
                                                    minimumFractionDigits: 0,
                                                    maximumFractionDigits: 2
                                                })
                                            }}</p>
                                        </div>
                                    </div>

                                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                        <div class="flex flex-col space-y-3">
                                            <a href="#" class="text-base font-medium  hover:underline text-white">
                                                  {{ item.title }}
                                            </a>
                                            <a href="#" class="text-base font-medium  hover:underline text-white">
                                                {{ item.description }}
                                            </a>
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <button type="button" @click="removeItemFromCart(index)"
                                                class="inline-flex items-center text-sm font-medium hover:underline text-red-500">
                                                <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <pre>{{cartItems==[]}}</pre> returns false because they are reference types they ary not the same obj in memeory -->
                            <div v-if="cartItems.length === 0" class=" text-center rounded-lg border p-4 shadow-sm border-gray-700 bg-gray-800
                            md:p-6 text-white">
                                Your cart is empty </div>

                        </div>
                    </div>

                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div class="space-y-4 rounded-lg border  p-4 shadow-sm border-gray-700 bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold  text-white">Order Summary</p>

                            <div class="space-y-4">
                                <dl class="flex items-center justify-between gap-4 border-t  pt-2 border-gray-700">
                                    <dt class="text-base font-bold text-white">Total</dt>
                                    <dd class="text-base font-bold text-white">${{
                                        totalCartPrice.toLocaleString('en-US', {
                                            minimumFractionDigits: 0,
                                            maximumFractionDigits: 2
                                        }) }}
                                    </dd>
                                </dl>
                            </div>

                            <button v-if="cartItems.length !== 0 && user != null" @click="CreateOrder" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium
                            text-white  focus:outline-none focus:ring-4  bg-primary-600
                            hover:bg-primary-700  focus:ring-primary-800 bg-blue-600 hover:bg-blue-700 transition-all">
                                Send Order</button>

                            <RouterLink v-if="user == null" :to="{ name: 'login' }">
                                <button class="flex w-full items-center justify-center rounded-lg bg-indigo-700 h= px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-800 transition-all
                                focus:outline-none focus:ring-4
                                ">Please Login</button>
                            </RouterLink>

                            <div class="flex items-center justify-center gap-2">
                                <span class="text-sm font-normal text-gray-500"> or </span>
                                <RouterLink :to="{ name: 'HomePage' }"
                                    class="inline-flex items-center gap-2 text-sm font-medium text-blue-700 underline hover:no-underline">
                                    Continue Shopping
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                    </svg>
                                </RouterLink>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="h-[75vh] md:h-[50vh] flex items-center justify-center" v-else>
                    <LogoSpinner></LogoSpinner>
                </div>
            </div>
        </section>
    </main>

</template>
<script setup>
import { computed } from 'vue';
import { RouterLink } from 'vue-router';
import store from "../../../store"
import LogoSpinner from "../../animation/image-spinner.vue"

const cartItems = computed(() => store.state.cartItems)


const totalCartPrice = computed(() =>

    cartItems.value.reduce((total, item) => total + (+item.total_price), 0)
)
const cartLoading = computed(() => store.state.cartLoading)
const user = computed(() => store.state.user.token)
function changeItemQuantity(product, v, index) {

    if (product.quantity <= 1 && v < 0) {
        store.dispatch('deleteItemFromCart', index) //index of specific cartitem not all ( contains product_id total_price etc)
        return
    }
    store.dispatch('changeItemQuantity', { product, v })
}

function removeItemFromCart(index) {
    store.dispatch('deleteItemFromCart', index)
    store.commit('showToast', 'Removed Successfully')
}

function CreateOrder() {
    store.commit('ToggleCartLoading')
    store.dispatch('createOrder').then(() => {
        store.commit('showToast','Your Order Has been Confirmed')
        store.dispatch('getCartFromDB')
    })
}
</script>
