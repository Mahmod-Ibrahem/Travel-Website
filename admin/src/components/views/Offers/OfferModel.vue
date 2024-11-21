<template>
    <TransitionRoot as="template" :show="showModel">
        <Dialog as="div" class="relative z-10" @close="showModel = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-70 transition-opacity" />
            </TransitionChild>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[700px] sm:w-full">
                            <Spinner v-if="loading"
                                class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-cente r justify-center" />
                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ offer.id ? `Update offer: ${offer.offer_name}` : 'Create new offer' }}
                                </DialogTitle>
                                <button @click="closeModal()"
                                    class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </header>
                            <form @submit.prevent="onSubmit">
                                <div class="bg-white px-4 pt-5 pb-4">
                                    <CustomInput class="mb-2" v-model="offer.offer_name" label="Name" />
                                    <CustomInput class="mb-2" v-model="offer.description" label="description" />
                                    <CustomInput class="mb-2" type="number" v-model="offer.price" label="Price" />

                                     <CustomInput type="file" class="mb-2" label="Offer Image" @change="file => offer.image = file" />

                                    <label for="startDate"
                                        class="ml-2 mb-1 text-sm font-semibold text-gray-900/90">Start Date</label>
                                    <input id="startDate" type="date" class="input_style" v-model="offer.startDate"
                                        placeholder="Start Date">

                                    <label for="startDate"
                                        class="ml-2 mb-1 text-sm font-semibold text-gray-900/90">EndDate</label>
                                    <input id="startDate" type="date" class="input_style"
                                     v-model="offer.endDate">

                                    <!-- <p v-if="errors" class="text-red-500 font-semibold text-sm">{{ errors }}</p> -->
                                </div>
                                <div class="flex flex-col p-2">
                            <ul v-if="errors" class="error">
                                <li v-for="error of errors.errors">{{ error }}</li>
                            </ul>

                        </div>
                                <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="submit" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2  text-base font-medium  focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
                          text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500">
                                        Submit
                                    </button>
                                    <button type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        @click="closeModal" ref="cancelButtonRef">
                                        Cancel
                                    </button>
                                </footer>
                            </form>

                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { computed, onUpdated, ref, defineProps } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import CustomInput from '../../core/CustomInput.vue'
import store from "../../../store/index.js";
import Spinner from "../../core/Spinner.vue"


const props = defineProps({
    modelValue: Boolean,
    offer: {
        required: true,
        type: Object,
    }
})


const offer = ref({
    id: props.offer.id,
    offer_name: props.offer.offer_name,
    description: props.offer.description,
    price: props.offer.price,
    image: props.offer.image,
    startDate: props.offer.startDate,
    endDate: props.offer.endDate,
})
const loading = ref(false)

const errors = ref('')

const emit = defineEmits(['update:modelValue', 'close'])

const showModel = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

function closeModal() {
    showModel.value = false
    errors.value = ''
    emit('close')

}

function onSubmit() {

    if (offer.value.id) {
        store.dispatch('editOffer', offer.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    store.commit('showToast', 'offer Updated Successfully')
                    store.dispatch('getOffers')
                    closeModal()
                }
            })
    }
    else
    {
    store.dispatch('addOffer', offer.value).then(() => {
        store.commit('showToast', 'offer Added Successfully')
        store.dispatch('getOffers')
        closeModal()

    }).catch(({ response }) => {
        errors.value = response.data
        console.log(errors.value)
    })
}
}

onUpdated(() => {
    offer.value = {
        id: props.offer.id,
        offer_name:props.offer.offer_name,
        description: props.offer.description,
        price: props.offer.price,
        image_url: props.offer.image,
        startDate: props.offer.startDate,
        endDate: props.offer.endDate,
        percentage: props.offer.percentage,
        type: props.offer.type ?  props.offer.type :''
    }
})


</script>
