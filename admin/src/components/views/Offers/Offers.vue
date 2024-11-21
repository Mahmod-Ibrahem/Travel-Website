<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="table-header p-2">Offers</h1>
    <button type="button"
            @click="showModel()"
            class="py-2 px-4 border border-transparent text-sm font-semibold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      Add New Offer
    </button>
  </div>
  <offerTable @clickEdit="editOffer"/>
  <offerModel v-model="showOfferModal" :offer="offerModel" @close="onModalClose"/>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../../store"
import offerTable from "./OffersTable.vue"
import OfferModel from "./OfferModel.vue"


const DEFAULT_offer=ref([{
    id:null,
    offer_name: '',
    description: '',
    price: '',
    image_url: null,
    startDate: null,
    endDate: null,
}])
// const offers = computed(() => store.state.offers.data);

const offerModel = ref(DEFAULT_offer.value)
const showOfferModal = ref(false);

function showModel() {
    showOfferModal.value = true
}

function editOffer(u) {
    offerModel.value = u;
    showModel();
}

function onModalClose() {
    offerModel.value = DEFAULT_offer.value
}

</script>

<style scoped>

</style>
