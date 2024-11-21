<template>
    <div v-if="userName.id" class="min-h-full flex ">
        <!-- Sider Bar -->
        <SideBar :class="{ '-ml-[200px]': !sidebarOpened }"></SideBar>
        <!--End OF SideBar-->
        <!--Nav Bar-->
        <div class="flex-1 bg-gray-200 ">
            <Heading @toggle-sidebar="toggleSideBar"></Heading>
            <!-- End of Heading-->
            <!--Content-->
            <main class="md:p-6 p-3">
                <div class="md:p-4 p-2 rounded bg-white shadow">
                    <RouterView></RouterView>
                </div>
            </main>
        </div>
    </div>
    <div v-else class="flex min-h-full items-center justify-center text-center">
        <Spinner></Spinner>
    </div>
    <!-- <Toast /> -->

</template>

<script setup>
import SideBar from '../../components/core/SideBar.vue'
import Heading from '../../components/core/Heading.vue'
import { ref, onMounted, onUnmounted, computed } from 'vue'
import store from '../../store';
import Spinner from '../../components/core/Spinner.vue'
import { RouterView } from 'vue-router';
// import Toast from './Core/Toast.vue';
const props = defineProps({
    title: String
})

const sidebarOpened = ref(true)
function toggleSideBar() {
    sidebarOpened.value = !sidebarOpened.value
}
onMounted(() => {
    store.dispatch('getCurrentUser')
    handleSidebar()
    window.addEventListener('resize', handleSidebar)
    store.dispatch('getCategories')
})
onUnmounted(() => {
    window.removeEventListener('resize', handleSidebar)
})
function handleSidebar() {
    sidebarOpened.value = window.outerWidth > 768
}

const userName=computed(()=>{
return  store.state.user.data
})
</script>

<style scoped></style>
