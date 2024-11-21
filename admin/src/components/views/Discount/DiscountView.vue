<template>
    <div v-if="discount ">

        <!--  Order Details-->
        <div class="" v-if="!loading &&discount.type!='Overall Price'">
            <div>
                <h2 class="flex justify-between items-center text-xl font-semibold pb-2 border-b border-gray-300">
                    Applied Product
                </h2>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <TableHeadingCell class="border-b-2 p-2 text-left " field="Id">
                                ID
                            </TableHeadingCell>

                            <TableHeadingCell class="border-b-2 p-2 text-left" field="title">

                                Title
                            </TableHeadingCell>
                            <TableHeadingCell class="border-b-2 p-2 text-left" field="quantity">

                                Qty
                            </TableHeadingCell>
                            <TableHeadingCell class="border-b-2 p-2 text-left" field="price">
                                Price
                            </TableHeadingCell>


                            <TableHeadingCell class="border-b-2 p-2 text-left" field="type">

                                Type
                            </TableHeadingCell>
                            <TableHeadingCell class="border-b-2 p-2 text-left" field="Not Sorted">
                                Actions
                            </TableHeadingCell>
                        </tr>
                    </thead>
                    <tbody v-if="!discount.products">
                        <tr>
                            <td colspan="5">
                                <Spinner class="my-4"></Spinner>

                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else class="text-center">
                        <tr v-for="(product, index) of discount.products" :key="product.id">
                            <td class="border-b p-2 ">{{ product.id }}</td>
                            <!-- <td class="border-b p-2 ">
                            <img class="w-16 h-16 object-cover" :src="product.image_url" :alt="product.title">
                        </td> -->
                            <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis ">
                                {{ product.title }}
                            </td>
                            <td class="border-b p-2">
                                {{ product.quantity }}
                            </td>
                            <td class="border-b p-2">
                                ${{ product.price }}
                            </td>
                            <td class="border-b p-2  ">
                                {{ product.type }}
                            </td>

                            <td class="border-b p-2  ">
                                <button type="button" @click="removeDiscountFromProduct(product)">
                                                <MinusCircleIcon
                                                    class="w-6 h-6 text-gray-800 font-semibold hover:text-red-600 transition-all">
                                                </MinusCircleIcon>
                                            </button>
                            </td>
                        </tr    >
                    </tbody>
                </table>
            </div>
            <!--/  Order Details v-for="(cat) of categories" @click="handleSelectedProd(cat)"   -->

            <!--  Customer Details-->
            <div>
                <h2 class="text-xl font-semibold mt-6 pb-2 border-b border-gray-300">Apply Discount On Product</h2>
                <div class="flex flex-col lg:py-4 gap-2">
                    <select class="input_style"  @change="handleSelectedProd"  >
                        <option selected>Choose  Category</option>
                        <option v-for="cat of categories" :value="cat.category" :key="cat.id" >{{cat.category}}</option>
                    </select>
                    <div v-if="selectedProducts" v-for="prod of selectedProducts" @click="applyDiscountOnProduct(prod)"
                    class="flex justify-between bg-gray-200/60 hover:bg-gray-300 transition-all p-2  cursor-pointer rounded-md">
                    <p class="font-medium">{{prod.title}}</p>
                    <PlusCircleIcon class="w-6 h-6 text-gray-800 font-semibold  transition-all cursor-pointer"/>
            </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" v-else>
        <Spinner></Spinner>
    </div>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
import store from "../../../store";
import { useRoute } from "vue-router";
import Spinner from "../../core/Spinner.vue";
import TableHeadingCell from "../../core/Table/TableHeadingCell.vue";
import { ChevronDoubleDownIcon, MinusCircleIcon, PlusCircleIcon } from "@heroicons/vue/24/outline";
import axiosClient from "../../../axios";

const route = useRoute()
const discount = ref(null);
const loading = ref(true)
const categories = computed(() => store.state.categories.data)
const products = computed(()=>store.state.products.data)
const selectedProducts = ref()
const selectedCategory=ref()
function handleSelectedProd(event)
{
     selectedCategory.value=event ? event.target.value : selectedCategory.value
    selectedProducts.value=products.value.filter((product)=>product.type==selectedCategory.value && product.discount_id==null)
    //filtering to select products that dont have discount
}

function applyDiscountOnProduct(product)
{
    store.dispatch('applyDiscountToProduct',{id:discount.value.id,product:product}).then(()=>{
        getDiscounts()
        getProducts().then(()=>{
            handleSelectedProd()
        })
    })
}

function removeDiscountFromProduct(product)
{
    store.dispatch('removeDiscountFromProduct',product).then(()=>{
        getDiscounts()
        getProducts().then(()=>{
            handleSelectedProd()
        })
    })
}

function getProducts(url = null) {
   return store.dispatch('getProducts', {
        url,
    })
}

function getDiscounts(){
    store.dispatch('getDiscount', route.params.id)
        .then(({ data }) => {
            loading.value = false
            discount.value = data
        })
}


onMounted(() => {
    getDiscounts()

        getProducts()
})



</script>

<style scoped></style>
