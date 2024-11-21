<template>
    <TransitionRoot appear :show="show" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black/25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[700px] sm:w-full">
                            <Spinner v-if="loading"
                                class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center" />
                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ product.id ? `Update product: "${props.product.title}"` : 'Create New Product' }}
                                </DialogTitle>
                                {{ product }}
                                <button @click="closeModal()"
                                    class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </header>

                            <!--New Product-->
                            <form @submit.prevent="onSubmit">
                                <div class="bg-white px-4 pt-5 pb-4">
                                    <!--             Product Category         -->
                                    <select name="type" v-model="product.type"
                                        class="customeInput w-full px-3 py-2 border focus:ring-indigo-500  ">
                                        <option selected value="">Select Category</option>
                                        <option :selected="product.type == 'breakfast'" value="breakfast">Breakfast
                                        </option>
                                        <option :selected="product.type == 'lunch'" value="lunch">Lunch</option>
                                        <option :selected="product.type == 'dinner'" value="dinner">Dinner</option>
                                        <option :selected="product.type == 'softdrinks'" value="softdrinks">Soft Drinks
                                        </option>
                                        <option :selected="product.type == 'hotdrinks'" value="hotdrinks">Hot Drinks
                                        </option>
                                    </select>

                                    <!--             Input Of Product Model           -->
                                    <CustomInput class="mb-2" v-model="product.title" label="Product Title" />
                                    <CustomInput type="file" class="mb-2" label="Product Image"
                                        @change="file => product.image = file" />
                                    <CustomInput type="textarea" class="mb-2" v-model="product.description"
                                        label="Description" />
                                        <CustomInput type="number" class="mb-2" v-model="product.originalPrice" label="Original Price"
                                        prepend="$" />

                                    <CustomInput type="number" class="mb-2" v-model="product.price" label="Price"
                                        prepend="$" />

                                    <CustomInput type="number" class="mb-2" v-model="product.quantity" label="Quantity"
                                        prepend="Qty" />
                                    <!-- <CustomInput type="checkbox" class="flex items-center" v-model="product.published"
                                        label="Published" :id="'published'" /> -->
                                        <div class="flex items-center mt-2">
                                        <input :id="'published'" :name="product.title" type="checkbox" :checked="product.published"
                                        @change="changeStatus($event.target.checked)"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                                    <label :for="'published '" class="select-none ml-2 block text-sm text-gray-900"> Published </label>
                                    </div>

                                </div>
                                <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="submit"
                                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                                        Submit
                                    </button>
                                    <button type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        @click="closeModal">
                                        Cancel
                                    </button>
                                </footer>
                            </form>
                            <!--End Of Adding New Product-->

                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import Spinner from "../../core/Spinner.vue"
import { defineProps, computed, onUpdated, ref } from 'vue'
import store from "../../../store"
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
import CustomInput from '../../core/CustomInput.vue';

const emit = defineEmits(['update:modelValue', 'close'])

const props = defineProps({
    modelValue: Boolean,
    product: {
        required: true,
        type: Object,
    }
})
const loading = ref(false)
const product = ref({
    id: props.product.id,
    type: props.product.type,
    title: props.product.title,
    image: props.product.image,
    description: props.product.description,
    quantity: props.product.quantity,
    price: props.product.price,
    originalPrice: props.product.originalPrice,
    published: props.product.published
})
const show = computed({
    get: () =>
        props.modelValue
    ,
    set: (value) =>
        emit('update:modelValue', value)

})
/* 2ol mra byrender bystd5m al get method 34an ya5od al value mn al parent y assignha ll show we lma ay t8ir y7sl  t8ir fi al show by7sl emit event
34an  y notify al parent b al new value di */

function changeStatus(value) {
    product.value.published = value
}

function closeModal() {
    show.value = false
    emit('close')
}
function onSubmit() {
    loading.value = true
    if (product.value.id) {
        store.dispatch('updateProduct', product.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    // TODO show notification
                    store.dispatch('getProducts')
                    closeModal()
                }
            })
    } else {
        store.dispatch('createProduct', product.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    // TODO show notification
                    store.dispatch('getProducts')
                    closeModal()
                }
            })
            .catch(err => {
                loading.value = false;
            })
    }
}
onUpdated(() => {
    product.value = {
        id: props.product.id,
        title: props.product.title,
        type: props.product.type,
        image: props.product.image,
        description: props.product.description,
        price: props.product.price,
        originalPrice: props.product.originalPrice,
        quantity: props.product.quantity,
        published: props.product.published
    }
})
//Triggered Lma ay 7aga fe al dom bta3 al component da by7slo change w hna aly daymn by7slo change al show

</script>
