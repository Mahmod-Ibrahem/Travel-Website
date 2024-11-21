<template>
  <div class="flex items-center justify-between space-x-4  mb-3 ">
    <h1 class="table-header p-2">Products</h1>
    <div v-if="!categoriesLoading"
        class="flex md:flex-row sm:flex-col md:space-x-2 md:space-y-0  sm:space-y-2 items-center">
    <RouterLink :to="{name:'app.products.create'}">
    <button type="submit"
      class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Add new Product
    </button>
</RouterLink>

    <button type="button"
    ref="showCategoryModal"
    @click="showBoxModal($event)"
      class="py-2 px-7 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Categories
    </button>

</div>
  </div>
  <ProductsTable @click-edit="EditProduct"></ProductsTable>
  <CategoryModal v-model="showModel.Category" ></CategoryModal>
  <!-- <DiscountModel v-model="showModel.Discount" ></DiscountModel> -->
</template>
<script setup>
import ProductsTable from './ProductsTable.vue';
import {computed, onMounted, ref} from 'vue';
import CategoryModal from './CategoryModal.vue';
import store from '../../../store';
import { RouterLink } from 'vue-router';


const showCategoryModal = ref(false)
const categoriesLoading=computed(()=>store.state.categories.loading)
const showModel=ref({
    Category:false,
    Discount:false,
})
function showBoxModal($event) {
    if($event.target==showCategoryModal.value)
{
    showModel.value.Category=true
}
}

function EditProduct(product) {
  store.dispatch('getProduct', product.id)
    .then(({ data }) => {
      productModel.value = data
    }
    )
}
// function onModalClose() {
//   productModel.value = {
//     id: '',
//     title: '',
//     type:'',
//     description: '',
//     price: '',
//     originalPrice:'',
//     quantity:'',
//   }
// }

onMounted(() => {

})
</script>

<style scoped></style>
