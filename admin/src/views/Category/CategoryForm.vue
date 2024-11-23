<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ category.id ? `Update Category: "${category.name}"` : 'Create New Category' }}
        </h1>
    </div>
    <div class="">
        <Spinner v-if="loading"
                 class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

        <form @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <select name="type" v-model="category.type"
                        class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Select Tour Section</option>
                    <option value="Day Tours">Day Tours</option>
                    <option value="Tour Packages">Tour Packages</option>
                </select>

                <CustomInput class="mb-2" v-model="category.name" label="Category Name"/>
                <CustomInput type="file" class="mb-2" label="category Image" @change="file => category.image = file"/>
            </div>
            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save
                </button>
                <button type="button"
                        @click="onSubmit($event,true)"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save & Close
                </button>
                <RouterLink :to="{ name: 'app.categories' }" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </RouterLink>
            </footer>
        </form>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import {ref, onMounted} from 'vue'
import {useRoute, useRouter} from "vue-router";
import store from "../../store/index.js"
import CustomInput from '../../components/Core/CustomInput.vue';

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const category = ref({
    id: null,
    type: '',
    name: '',
    image: '',
})

/* 2ol mra byrender byst5m al get method 34an ya5od al value mn al parent y assignha ll show we lma ay t8ir y7sl  t8ir fi al show by7sl emit event
34an  y notify al parent b al new value di */


function onSubmit($event, close = false) {
    loading.value = true
    if (category.value.id) {
        store.dispatch('updateCategory', category.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    store.commit('showToast', 'Category has  successfully updated')
                    store.dispatch('getCategories')
                    if (close) {
                        router.push({name: 'app.categories'})
                    }
                }
            })
    } else {
        store.dispatch('createCategory', category.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    store.commit('showToast', 'Cateogry has  successfully created')
                    store.dispatch('getCategories')
                    if (close) {
                        router.push({name: 'app.categories'})
                    } else {
                        router.push({name: 'app.categories.edit', params: {id: response.data.id}})
                    }
                }
            })
            .catch(err => {
                loading.value = false;
            })
    }
}

onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store.dispatch('getCategory', route.params.id)
            .then((response) => {
                loading.value = false;
                category.value = response.data
            })
    }
})
</script>
