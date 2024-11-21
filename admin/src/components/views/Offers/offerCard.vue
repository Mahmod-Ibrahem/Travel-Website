<template>
    <!-- This is an example component -->
        <div v-for="offer in Offers"
            class='w-[22rem]  mx-auto  border-[#c1121f] border-[3px] rounded-3xl shadow-xl overflow-hidden h-[33rem]'>
            <div class='max-w-md mx-auto'>
                <div class='h-[236px]' >
                    <img class='w-full h-full object-cover ' :src="offer.image_url" :alt="offer.title">
                </div>
                <div class='p-4 sm:p-6'>
                    <p class='font-bold text-[#fdf0d5] text-[22px] leading-7 mb-1 truncate '>{{offer.title}}</p>
                    <p class="text-[#fdf0d5] font-[15px] mt-6 h-[4.8rem] text-ellipsis line-clamp-3">
                        {{ offer.description }}
                    </p>
                    <p CLASS="text-[#fdf0d5] font-bold text-lg mt-2 bg-red-600 inline-block px-2 border border-transparent rounded-l rounded-r">{{ offer.price }}</p>
                    <button @click="AddToCart(offer)"   class='block mt-5 w-full px-4 py-3 font-medium tracking-wide text-center
                    capitalize transition-colors duration-300 transform  rounded-[14px]  text-white  bg-red-600 hover:bg-red-700'>
                        Add To Cart
                    </button>

                </div>
            </div>
        </div>

</template>

<script setup>
import store from "@/store";
import {computed} from "vue";
const Offers=computed(()=>store.state.offers.data)
function AddToCart(item) {
    store.dispatch('changeItemQuantity', { product: item })
    store.commit('showToast', 'Added To Cart')
}
</script>

<style scoped>

</style>
