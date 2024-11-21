<template>
    <div class="w-[20rem] rounded-xl shadow-lg shadow-white overflow-hidden mx-auto box  border-2 border-gray-800 md:mr-4">
        <div class="img-box group ">
            <img class="h-36 w-36 object-fit  group-hover:scale-110 transition-all duration-300" :src="image"
                alt="Delicious Pizza">
        </div>
        <div class="p-6 bg-gray-800 rounded-b-xl text-white ">
            <h2 class="text-xl font-bold   whitespace-nowrap overflow-hidden text-ellipsis">{{ title }}</h2>
            <p class="text-gray-400 mt-2 h-[5rem] overflow-hidden text-ellipsis">{{ description }}</p>
            <div class="flex justify-between items-center mt-4  ">
                <span class="text-lg font-semibold">${{ price }}</span>
                <button @click="AddToCart()" class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


</template>
<script setup>
import { useCookies } from 'vue3-cookies';
import store from '../../store';
import { ref } from 'vue';
const { cookies } = useCookies();

const props = defineProps({
    id: Number,
    title: String,
    price: String,
    description: String,
    image: String
})
const product=ref({
id:props.id,
title:props.title,
price:props.price,
description:props.description,
image:props.image
})

function AddToCart(){
    store.dispatch('changeItemQuantity',{product:product.value})
    store.commit('showToast','Added To Cart')
}

</script>
