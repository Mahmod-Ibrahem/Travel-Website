<template>
    <div v-if="!loading && !errorMsg"
         class="flex flex-col justify-center items-center text-gray-900 print-only font-semibold ">

        <div class="rounded-md relative   p-3 bg-white border w-[20rem] ">
            <div class="py-2">
                <div class="text-center text-xl font-bold">ORDER #{{ order.id }}</div>
            </div>
            <div class="text-center text-xs font-bold mb-1">~~~~~~~~~~~~~~~~~~~~~~~~~~~~</div>
            <div class="text-xs pl-2">
                <div class="text-xs mb-1">Customer: {{ order.customer.name }}</div>
                <div class="text-xs mb-1">Room #{{ order.customer.room }}</div>
            </div>
            <div class="border-double border-t-4 border-b-4 border-l-0 border-r-0 border-gray-900 my-3">
                <div class="flex text-sm pt-1 px-1">
                    <span class="w-2/6">Name</span>
                    <span class="w-2/6 text-right">Price</span>
                    <span class="w-2/6 text-right">Qty</span>
                </div>
                <div class="border-dashed border-t border-b border-l-0 border-r-0 border-gray-900 mt-1 my-2 py-2 px-1">
                    <div v-for="item in order.items" class="flex justify-between text-sm">
                        <span class="w-2/6">{{ item.product.title }}</span>
                        <span class="w-2/6 text-right">${{
                                item.discount_percentage ? item.product.unit_price * item.quantity * (1 - item.discount_percentage / 100) : item.product.unit_price * item.quantity
                            }}</span>
                        <span class="w-2/6 text-right">X{{ item.quantity }}</span>
                    </div>
                </div>
            </div>
            <div class="text-xs">
                <div v-if="store.state.discounts.data[0].type=='Overall Price'" class="font-bold text-sm">Discount :
                    {{ store.state.discounts.data[0].percentage }}%
                </div>
                <div class="font-bold text-sm">Total : {{ order.total_price }}</div>
                <div class="text-right">
                    <div>Time：{{ order.created_at }}</div>
                </div>
            </div>
        </div>


    </div>

    <div v-else-if="errorMsg" class="flex justify-center items-center font-semibold text-red-500">
        <h1>{{ errorMsg }}</h1>
    </div>

    <div v-else>
        <Spinner></Spinner>
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import store from '../../../store';
import {useRoute} from 'vue-router';
import Spinner from '../../core/Spinner.vue';

const route = useRoute();
const order = ref(null);
const loading = ref(true);

const errorMsg = ref('')


function printBill() {
    ButtonIsVisible.value = false;
    window.print();
    ButtonIsVisible.value = true;
}


const ButtonIsVisible = ref(true);

onMounted(() => {
    store.dispatch('getOrder', route.params.id).then(({data}) => {
        loading.value = false;
        order.value = data;
    }).catch(({response}) => {
        if (response.status === 404) {
            loading.value = false;
            errorMsg.value = 'The order is not exist or deleted'
        }
    })
});
</script>

<style>

</style>
