<template>
    <Spinner v-if="loading" class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center" />
    <header class="py-3 px-4 flex justify-between items-center">
        <h1  class="text-lg leading-6 font-medium text-gray-900">
            {{ product.id ? `Update product: "${product.title}"` : 'Create New Product' }}
        </h1>
    </header>

    <!--New Product-->
    <form @submit.prevent="onSubmit">
        <div class="bg-white px-4 pt-5 pb-4">
            <!--             Product Category         -->

            <select name="type" v-model="product.type"
                class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Select Category</option>
                <option v-for="cat of categories" :selected="product.type==cat.category" :value="cat.category" >{{cat.category}}</option>
            </select>


            <!--             Input Of Product Model           -->
            <CustomInput class="mb-2" v-model="product.title" label="Product Title" />

            <CustomInput type="textarea" class="mb-2" v-model="product.description" label="Description" />

            <CustomInput v-if="product.type=='Offer'"
                         type="file" class="mb-2" label="Product Image" @change="file => product.image = file" />

                <CustomInput type="number" class="mb-2" v-model="product.originalPrice" label="Original Price"
                prepend="$" />

            <CustomInput type="number" class="mb-2" v-model="product.price" label="Price" prepend="$" />

            <CustomInput type="number" class="mb-2" v-model="product.quantity" label="Quantity" prepend="Qty" />

            <div class="flex items-center my-2 ">
                <input id='published' :name="product.title" type="checkbox" :checked="product.published"
                    @change="changeStatus($event.target.checked)"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                <label for="published" class="select-none ml-2 block text-sm text-gray-900"> Published </label>
            </div>
            <p v-if="error" class="text-red-600 font-semibold">{{ error }}</p>

        </div>
        <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button @click="onSubmit($event, true)" type="button"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                Save & Close
            </button>
            <button type="submit"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                Save
            </button>
            <RouterLink :to="{ name: 'app.products' }" type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </RouterLink>
        </footer>
    </form>
    <!--End Of Adding New Product-->

</template>

<script setup>
import Spinner from "../../core/Spinner.vue"
import { ref, onMounted } from 'vue'
import store from "../../../store"
import CustomInput from '../../core/CustomInput.vue';
import { RouterLink, useRoute } from "vue-router";
import router from "../../../router";

// const emit = defineEmits(['update:modelValue', 'close'])

const route = useRoute()

const loading = ref(false)

const product = ref({
    id: null,
    type: '',
    title: null,
    description: null,
    quantity: null,
    price: null,
    originalPrice: null,
    published: false,
})

const error =ref('')

//check for special character

// function checkForSpecialCharacter(value) {
//     const specialCharacterPattern = /[!@#$%^&*(),.?":{}|<>]/g;
//
//     return specialCharacterPattern.test(value);
// }

const categories = ref('')

function changeStatus(value) {
    product.value.published = value
}

function onSubmit($event, close = false) {
    loading.value = true
    if (product.value.id) {
        store.dispatch('updateProduct', product.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    store.commit('showToast', 'Product has  successfully updated')
                    store.dispatch('getProducts')
                    if (close) {
                        router.push({ name: 'app.products' })
                    }
                    else {
                        router.push({ name: 'app.products.edit', params: { id: product.value.id } })
                    }
                }
            })
    } else {
        store.dispatch('createProduct', product.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    store.commit('showToast', 'Product has  successfully created')
                    store.dispatch('getProducts')
                    if (close) {
                        router.push({ name: 'app.products' })
                    }
                    else {
                        router.push({ name: 'app.products.edit',params:{id:response.data.id}})
                    }
                }
            })
            .catch(err => {
                loading.value = false;
                if(err.response.status==422)
            {
                if(err.response.data=='Product Is Already Exist')
            {
                error.value=err.response.data
            }
            else{
                error.value='Invalid Input'
            }
            }
            })
    }
}

onMounted(() => {
    loading.value = true
    if (route.params.id) {


    Promise.all([
    store.dispatch('getProduct', route.params.id),
    store.dispatch('getCategories')
])
.then(([productResponse, categoriesResponse]) => {
    product.value = productResponse.data; // Set product data
    categories.value = categoriesResponse.data; // Set categories data
})
.finally(() => {
    loading.value = false; // Set loading to false after both requests
});
    }
    else {
        store.dispatch('getCategories').then(({ data }) => {
            loading.value = false;
            categories.value = data
        })
    }
})
</script>
