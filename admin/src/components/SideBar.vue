<template>
    <div class="w-[200px]  transition-all bg-indigo-700 text-white py-4 px-2">
        <RouterLink :to="{ name: 'app.products' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Tours
            </span>
        </RouterLink>

        <RouterLink :to="{ name: 'app.reviews' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Reviews
            </span>
        </RouterLink>
        <RouterLink :to="{ name: 'app.faqs' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Faqs
            </span>
        </RouterLink>
        <RouterLink :to="{ name: 'app.bookings' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Bookings
            </span>
        </RouterLink>
        <RouterLink :to="{ name: 'app.cities' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Blog Cities
            </span>
        </RouterLink>
        <RouterLink :to="{ name: 'app.blogs' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Blogs
            </span>
        </RouterLink>
        <RouterLink :to="{ name: 'app.locations' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Locations
            </span>
        </RouterLink>
        <RouterLink :to="{ name: 'app.inclusions' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Inclusions
            </span>
        </RouterLink>
        <RouterLink :to="{ name: 'app.exclusions' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Exclusions
            </span>
        </RouterLink>

        <RouterLink :to="{ name: 'app.settings' }" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs font-medium">
                Settings
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
import store from "../store";
const user = computed(() => store.state.user.data)

</script>


<style scoped></style>
