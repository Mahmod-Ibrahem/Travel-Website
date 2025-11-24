<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ location.id ? `Update Location: "${location.name}"` : 'Create New Location' }}
        </h1>
    </div>
    <div>
        <Spinner
            v-if="loading"
            class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"
        />

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <!-- name (default locale) -->
                <CustomInput
                    class="mb-2"
                    v-model="location.name"
                    label="Location Name"
                    :errors="errors.name"
                />

                <!-- position (sortable index) -->
                <CustomInput
                    class="mb-2"
                    type="number"
                    v-model.number="location.position"
                    label="Position"
                    placeholder="e.g. 1"
                    :errors="errors.position"
                    min="0"
                />

                <!-- image -->
                <CustomInput
                    type="file"
                    class="mb-2"
                    label="Location Image"
                    @change="file => (location.image = file)"
                    :errors="errors.image"
                />

                <!-- optional preview if editing and backend returns image_url -->
                <div v-if="location.image_url" class="mt-2">
                    <img :src="location.image_url" alt="Location image" class="w-24 h-24 object-cover rounded" />
                </div>
            </div>

            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button"
                        @click="onSubmit($event,true)"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save
                </button>
                <RouterLink :to="{ name: 'app.locations' }" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </RouterLink>
            </footer>
        </form>
    </div>
</template>

<script setup>
import Spinner from "./../../components/Core/Spinner.vue";
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import store from "../../store/index.js";
import CustomInput from "../../components/Core/CustomInput.vue";

const emit = defineEmits(["update:modelValue", "close"]);
const route = useRoute();
const router = useRouter();

const loading = ref(false);
const location = ref({
    id: null,
    name: "",
    image: null,
    position: null,     // <-- added to match model
    image_url: null,    // optional preview if your API returns it
});

const errors = ref({});

function onSubmit($event, close = false) {
    loading.value = true;
    errors.value = {};

    const action = location.value.id ? "updateLocation" : "createLocation";
    const successStatus = action === "updateLocation" ? 200 : 201;
    const successMessage =
        action === "updateLocation"
            ? "Location has been successfully updated"
            : "Location has been successfully created";

    store
        .dispatch(action, location.value)
        .then((response) => {
            loading.value = false;
            if (response.status === successStatus) {
                store.commit("showToast", successMessage);
                store.dispatch("getLocations");

                if (close) {
                    router.push({ name: "app.locations" });
                } else if (action === "createLocation") {
                    location.value = response.data;
                    router.push({
                        name: "app.locations.edit",
                        params: { id: response.data.id },
                    });
                }
            }
        })
        .catch((err) => {
            loading.value = false;
            if (err.response?.status === 422) {
                errors.value = err.response.data.errors;
                console.log(errors.value);
            } else if (err.response?.status === 409) {
                store.commit("showErrorToast", err.response.data.message);
            } else {
                store.commit("showErrorToast", "An error occurred while submitting the form.");
            }
        });
}

onMounted(() => {
    if (route.params.id) {
        loading.value = true;
        store
            .dispatch("getLocation", route.params.id)
            .then((response) => {
                loading.value = false;
                location.value = response.data;
            });
    }
});
</script>
