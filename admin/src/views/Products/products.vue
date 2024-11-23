<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="text-3xl font-semibold">Products</h1>
    <RouterLink :to="{name:'app.products.create'}"
      class="py-2 px-4 border border-transparent text-sm font-medium
      rounded-md text-white bg-indigo-600 hover:bg-indigo-700
      focus:outline-none focus:ring-2 focus:ring-offset-2
      focus:ring-indigo-500">
      Add new Product
    </RouterLink>
  </div>
  <ProductModel v-model="showModal" :product="productModel" @close="onModalClose"></ProductModel>
  <ProductsTable @click-edit="EditProduct"></ProductsTable>
</template>
<script setup>
import ProductsTable from './ProductsTable.vue';
import ProductModel from "./ProductModel.vue"
import { ref } from 'vue';
import store from '../../store';
const showModal = ref(false)

const productModel = ref({
  id: '',
  title: '',
  image: '',
  description: '',
  price: '',

})


function EditProduct(product) {
  store.dispatch('getProduct', product.id)
    .then(({ data }) => {
      productModel.value = data
    }
    )
}
function onModalClose() {
  productModel.value = {
    id: '',
    title: '',
    published:false,
    image: '',
    description: '',
    price: '',

  }
}
</script>

<style scoped></style>
