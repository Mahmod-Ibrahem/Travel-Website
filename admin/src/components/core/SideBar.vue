<template>
    <div class="w-[200px]  transition-all bg-indigo-700 text-white py-4 px-2">
        <RouterLink :to="{ name: 'HomePage' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <HomeIcon class="w-5" />
            </span>
            <span class="text-xs">
                Home Page
            </span>
        </RouterLink>
        <RouterLink v-if="user.role == 'Admin'" :to="{ name: 'app.dashboard' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <DocumentChartBarIcon class="w-5" />
            </span>
            <span class="text-xs">
                Dashboard
            </span>
        </RouterLink>
        <RouterLink v-if="user.role == 'Admin'" :to="{ name: 'app.products' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Products
            </span>
        </RouterLink>

        <RouterLink v-if="user.role == 'Admin'" :to="{ name: 'app.discounts' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Discounts
            </span>
        </RouterLink>


        <RouterLink v-if="user.role == 'Admin'|| 'Staff'" :to="{ name: 'app.orders' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Orders
            </span>
        </RouterLink>

        <RouterLink v-if="user.role == 'Admin'" :to="{ name: 'app.Staff' }"
            class="flex items-center p-2 rounded transition-colors hover:bg-black/30">
            <span class="mr-2 text-gray-300">
                <UsersIcon class="w-5" />
            </span>
            <span class="text-xs">
                Staff
            </span>
        </RouterLink>

        <RouterLink :to="{ name: 'app.guests' }"
            class="flex items-center p-2 rounded transition-colors hover:bg-black/30">
            <span class="mr-2 text-gray-300">
                <UsersIcon class="w-5" />
            </span>
            <span class="text-xs">
                Guests
            </span>
        </RouterLink>


    </div>
</template>

<script setup>
import {
    HomeIcon, ListBulletIcon, UsersIcon, ChartBarIcon, DocumentChartBarIcon
} from '@heroicons/vue/24/outline'
import { computed } from 'vue';
import { RouterLink } from 'vue-router';
import store from "../../store"
const user = computed(() => store.state.user.data)

</script>


<style scoped></style>
