<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="table-header p-2">Guests</h1>
    <button type="button"
            @click="showAddNewModal()"
            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      Add new guest
    </button>
  </div>
  <GuestTable @clickEdit="editGuest"/>
  <GuestModal v-model="showguestModal" :guest="guestModel" @close="onModalClose"/>
</template>

<script setup>
import {computed, ref} from "vue";
import store from "../../../store"
import GuestModal from './GuestModal.vue'
import GuestTable from "./GuestTable.vue";
const DEFAULT_GUEST=ref([{
    user_id:'',
    name:'',
    password:'',
    email:'',
    room:''
}])
const guests = computed(() => store.state.guests);

const guestModel = ref({guests})
const showguestModal = ref(false);

function showAddNewModal() {
  showguestModal.value = true
}

function editGuest(u) {
    guestModel.value = u;
    showAddNewModal();
}

function onModalClose() {
  guestModel.value = {...DEFAULT_GUEST}
}
</script>

<style scoped>

</style>
