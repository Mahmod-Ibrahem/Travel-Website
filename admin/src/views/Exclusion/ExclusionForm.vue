<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ exclusion.id ? `Update Exclusion: "${exclusion.title}"` : 'Create New Exclusion' }}
        </h1>
    </div>
    <div>
        <Spinner v-if="loading"
            class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center" />

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <CustomInput class="mb-2" v-model="exclusion.title" placeholder="Exclusion Title"
                    :errors="errors.title" />
            </div>
            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" @click="onSubmit($event, true)"
                    class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save
                </button>
                <RouterLink :to="{ name: 'app.exclusions' }" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </RouterLink>
            </footer>
        </form>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from "vue-router";
import store from "../../store/index.js"
import CustomInput from '../../components/Core/CustomInput.vue';

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const exclusion = ref({
    id: null,
    title: '',
})

const errors = ref({
})

function onSubmit($event, close = false) {
    loading.value = true;
    errors.value = {}
    const action = exclusion.value.id ? 'updateExclusion' : 'createExclusion';
    const successStatus = action === 'updateExclusion' ? 200 : 201;
    const successMessage = action === 'updateExclusion' ? 'Exclusion has successfully updated' : 'Exclusion has successfully created';

    store.dispatch(action, exclusion.value)
        .then(response => {
            loading.value = false;
            if (response.status === successStatus) {
                store.commit('showToast', successMessage);
                if (close) {
                    router.push({ name: 'app.exclusions' });
                } else if (action === 'createExclusion') {
                    exclusion.value = response.data
                    router.push({ name: 'app.exclusions.edit', params: { id: response.data.id } });
                }
            }
        })
        .catch(err => {
            loading.value = false;
            if (err.response.status === 422) {
                errors.value = err.response.data.errors;
                console.log(errors.value)
            } else if (err.response.status === 409) {
                store.commit('showErrorToast', err.response.data.message);
            } else {
                store.commit('showErrorToast', 'An error occurred while submitting the form.');
            }
        });
}
onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store.dispatch('getExclusion', { exclusionId: route.params.id })
            .then((response) => {
                loading.value = false;
                exclusion.value = response.data
            })
    }
})
</script>
