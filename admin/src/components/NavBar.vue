<template>
    <header class="flex justify-between items-center p-3 h-14 shadow bg-white">
        <button @click="emit('toggle-sidebar')"
            class="flex items-center justify-center rounded transition-colors w-8 h-8 text-gray-700 hover:bg-black/10">
            <Bars3Icon class="w-6" />
        </button>
        <div class="flex items-center gap-4">
            <!-- Notification Bell -->
            <Menu as="div" class="relative inline-block text-left" @click="markAllAsRead">
                <MenuButton
                    class="relative flex items-center justify-center w-8 h-8 rounded-full hover:bg-gray-100 transition-colors">
                    <BellIcon class="w-6 h-6 text-gray-600" />
                    <!-- Notification Badge -->
                    <span v-if="unreadCount > 0"
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full min-w-[18px] h-[18px] flex items-center justify-center px-1">
                        {{ unreadCount > 99 ? '99+' : unreadCount }}
                    </span>
                </MenuButton>
                <transition enter-active-class="transition duration-100 ease-out"
                    enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                    leave-active-class="transition duration-75 ease-in"
                    leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                    <MenuItems class="absolute right-0 mt-2 w-80 origin-top-right rounded-md bg-white shadow-lg
                        ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
                        <div class="p-3 border-b border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                        </div>
                        <div ref="notificationContainer" @scroll="handleScroll" class="max-h-80 overflow-y-auto">
                            <div v-if="notifications.length === 0" class="p-4 text-center text-gray-500 text-sm">
                                No notifications
                            </div>
                            <MenuItem v-for="notification in notifications" :key="notification.id" v-slot="{ active }">
                            <div :class="[
                                active ? 'bg-gray-50' : '',
                                notification.read_at ? 'bg-white' : 'bg-blue-50',
                                'px-4 py-3 cursor-pointer border-b border-gray-100 last:border-b-0'
                            ]" @click="goToBooking(notification.booking_id)">
                                <div class="flex items-start gap-3">
                                    <div :class="[
                                        'w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0',
                                        notification.type === 'success' ? 'bg-green-100 text-green-600' :
                                            notification.type === 'warning' ? 'bg-yellow-100 text-yellow-600' :
                                                notification.type === 'error' ? 'bg-red-100 text-red-600' :
                                                    'bg-blue-100 text-blue-600'
                                    ]">
                                        <BellAlertIcon class="w-4 h-4" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            New Booking
                                        </p>
                                        <p class="text-xs text-gray-500 mt-0.5 line-clamp-2">
                                            {{ notification.title }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">
                                            {{ notification.date }}
                                        </p>
                                    </div>
                                    <div v-if="!notification.read"
                                        class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0 mt-1.5"></div>
                                </div>
                            </div>
                            </MenuItem>
                            <!-- Loading indicator -->
                            <div v-if="isLoading" class="p-3 text-center">
                                <div
                                    class="inline-block w-5 h-5 border-2 border-indigo-600 border-t-transparent rounded-full animate-spin">
                                </div>
                            </div>
                        </div>
                        <div class="p-2 border-t border-gray-100">
                        </div>
                    </MenuItems>
                </transition>
            </Menu>

            <!-- User Menu -->
            <Menu as="div" class="relative inline-block text-left">
                <MenuButton class="flex items-center">
                    <small>{{ userName.name }}</small>
                    <ChevronDownIcon class="h-5 w-5 text-violet-200 hover:text-violet-100" aria-hidden="true" />
                </MenuButton>
                <transition enter-active-class="transition duration-100 ease-out"
                    enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                    leave-active-class="transition duration-75 ease-in"
                    leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                    <MenuItems class="absolute right-0 mt-2 w-36 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg
                        ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
                        <div class="px-1 py-1">
                            <MenuItem v-slot="{ active }">
                            <button @click="logout" :class="[
                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                            ]">
                                <ArrowLeftStartOnRectangleIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                    aria-hidden="true" />
                                Logout
                            </button>
                            </MenuItem>
                        </div>
                    </MenuItems>
                </transition>
            </Menu>
        </div>
    </header>
</template>

<script setup>
import { Bars3Icon, ArrowLeftStartOnRectangleIcon, BellIcon, BellAlertIcon } from '@heroicons/vue/24/outline'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/24/solid'
import store from '../store';
import router from '../router';
import { computed, ref, onMounted } from 'vue';

const emit = defineEmits(['toggle-sidebar'])

const notifications = ref([])
const isLoading = ref(false)
const currentPage = ref(1)
const hasMore = ref(true)
const notificationContainer = ref(null)

const unreadCount = computed(() => {
    return notifications.value.filter(n => !n.read_at).length
})

const userName = computed(() => {
    return store.state.user.data
})

function goToBooking(id) {
    router.push({ name: 'app.bookings.edit', params: { id: id } })
}

// Fetch notifications from API
function getNotifications(page = 1) {
    if (isLoading.value || (page > 1 && !hasMore.value)) return

    isLoading.value = true
    store.dispatch('notifications/getNotifications', { page: page }).then(() => {
        if (page === 1) {
            notifications.value = store.state.notifications.data
        } else {
            notifications.value.push(...store.state.notifications.data)
        }

        const meta = store.state.notifications.meta;
        hasMore.value = meta.current_page < meta.last_page;
        currentPage.value = page;
    }).finally(() => {
        isLoading.value = false
    })


}

// Handle scroll for infinite loading
function handleScroll(event) {
    const { scrollTop, scrollHeight, clientHeight } = event.target
    if (scrollTop + clientHeight >= scrollHeight - 10 && hasMore.value && !isLoading.value) {
        getNotifications(currentPage.value + 1)
    }
}
// Mark all as read
function markAllAsRead() {
    if (unreadCount.value > 0)
        store.dispatch('notifications/markAllAsRead')

    notifications.value.forEach(n => n.read_at = true)
}

function logout() {
    store.dispatch('logout')
        .then(() => {
            router.push({ name: 'login' })
        })
}

onMounted(() => {
    getNotifications()
})
</script>