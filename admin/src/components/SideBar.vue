<template>
    <div class="w-[200px]  transition-all bg-indigo-700 text-white py-4 px-2">
        <RouterLink :to="{name:'app.products'}"  class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Products
            </span>
        </RouterLink>

        <RouterLink :to="{name:'app.categories'}"  class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Categories
            </span>
        </RouterLink>
    </div>
</template>

<script setup>
import {
    HomeIcon, ListBulletIcon, UsersIcon, ChartBarIcon, DocumentChartBarIcon
} from '@heroicons/vue/24/outline'
import {computed} from 'vue';
import {RouterLink} from 'vue-router';
import store from "../store";
const user = computed(() => store.state.user.data)

</script>


<style scoped></style>
