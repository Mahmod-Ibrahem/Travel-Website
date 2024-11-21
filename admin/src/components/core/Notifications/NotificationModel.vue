    <template>
        <Menu as="div" class="relative">
            <div class="flex items-center justify-center">
                <MenuButton>
                    <BellIcon class="h-6 w-6" aria-hidden="true" />
                </MenuButton>
            </div>
            <transition enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95">
                <MenuItems class="absolute -left-11 w-56 md:w-[20rem] z-10 mt-2   bg-white  shadow-lg focus:outline-none rounded-md overflow-hidden
                 ">
                    <MenuItem v-for="notification of props.notifications" v-slot="{ active }">

                    <RouterLink :to="{ name: 'app.orders.bill', params: { id: notification.data[0].id } }">

                        <p class="text-gray-600 text-sm  font-semibold p-2 border-b-2 border-gray-200 hover:bg-gray-100 transition-all">
                            {{ notification.data[0].GuestName }} <span class="font-bold text-blue-500">Made an
                                order #{{
                                    notification.data[0].id }}
                            </span>

                            Room <span class="font-bold text-blue-500">#{{ notification.data[0].Room }}</span> <span
                                class="font-bold"> Created from {{ notification.created_at }}</span>
                        </p>
                    </RouterLink>

                    </MenuItem>
                </MenuItems>
            </transition>
        </Menu>

    </template>

<script setup>
import { RouterLink } from 'vue-router';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'

import { BellIcon, ShoppingCartIcon, UserCircleIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
    notifications: {
        required: true
    }
})
</script>
