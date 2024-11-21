<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="table-header p-2">Discounts</h1>
    <button type="button"
            @click="showModel()"
            class="py-2 px-4 border border-transparent text-sm font-semibold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      Add New Discount
    </button>
  </div>
  <DiscountTable @clickEdit="editDiscount"/>
  <DiscountModel v-model="showDiscountModal" :discount="discountModel" @close="onModalClose"/>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../../store"
import DiscountTable from "./DiscountTable.vue"
import DiscountModel from "./DiscountModel.vue"


const DEFAULT_DISCOUNT=ref([{
    id:null,
    startDate: null,
    endDate: null,
    percentage: null,
    type: '',
}])
// const discounts = computed(() => store.state.discounts.data);

const discountModel = ref(DEFAULT_DISCOUNT.value)
const showDiscountModal = ref(false);

function showModel() {
    showDiscountModal.value = true
}

function editDiscount(u) {
    discountModel.value = u;
    showModel();
}

function onModalClose() {
    discountModel.value = DEFAULT_DISCOUNT
}

</script>

<style scoped>

</style>
