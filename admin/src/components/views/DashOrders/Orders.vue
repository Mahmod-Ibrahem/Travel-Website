<template>
  <div class="flex items-center justify-between space-x-4  mb-3 ">
    <h1 class="table-header p-2">Orders</h1>
  </div>
  <OrdersTable/>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../../store"
import OrdersTable from "./OrdersTable.vue";

const orders = computed(() => store.state.orders);


</script>

<style scoped>

</style>
