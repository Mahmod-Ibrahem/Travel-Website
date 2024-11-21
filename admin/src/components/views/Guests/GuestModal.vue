<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <TransitionRoot as="template" :show="show">
        <Dialog as="div" class="relative z-10" @close="show = false">
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
                                class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center" />
                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ guest.id ? `Update guest: "${props.guest.name}"` : 'Create new guest' }}
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
                                    <CustomInput class="mb-2" v-model="guest.name" label="Name" />
                                    <CustomInput class="mb-2" v-model="guest.email" label="Email" />
                                    <CustomInput class="mb-2" v-model="guest.room" label="Room" />
                                    <CustomInput type="password" class="mb-2" v-model="guest.password"
                                        label="Password" />
                                </div>
                                <div class="flex items-center ml-5">
                                        <input id="Status" :name="guest.name" type="checkbox" :checked="guest.status"
                                        @change="changeStatus($event.target.checked)"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                                    <label for="Status" class="ml-2 block text-sm text-gray-900 select-none"> Status </label>
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
    guest: {
        required: true,
        type: Object,
    }
})

const guest = ref({
    id: props.guest.user_id,
    name: props.guest.name,
    email: props.guest.email,
    password: props.guest.password,
    room: props.guest.room,
    status:props.guest.status
})


const loading = ref(false)



const emit = defineEmits(['update:modelValue', 'close'])

const show = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

onUpdated(() => {
    guest.value = {
        id: props.guest.user_id,
        name: props.guest.name,
        email: props.guest.email,
        password: props.guest.password,
        room: props.guest.room,
        status:props.guest.status
    }
})

function closeModal() {
    show.value = false
    emit('close')
}
function changeStatus(value) {
    guest.value.status = value
}
function onSubmit() {
    loading.value = true
    if (guest.value.id) {
        store.dispatch('updateGuest', guest.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    // TODO show notification
                    store.dispatch('getGuests')
                    closeModal()
                }
            })
    } else {
        store.dispatch('createGuest', guest.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    // TODO show notification
                    store.dispatch('getGuests')
                    closeModal()
                }
            })
            .catch(err => {
                loading.value = false;
            })
    }
}
</script>
