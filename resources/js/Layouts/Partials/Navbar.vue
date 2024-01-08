<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import Message from "@/Icons/Message.vue";
import Notification from "@/Icons/Notification.vue";

const { user } = usePage().props.auth;
const mobileNav = ref(false);
</script>

<template>
    <nav class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="flex flex-shrink-0 items-center">
                        <Link href="/">
                            <h2 class="font-bold text-2xl">Barta</h2>
                        </Link>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <Link
                            href="/"
                            class="inline-flex items-center border-b-2 border-gray-800 px-1 pt-1 text-sm font-semibold text-gray-900"
                        >
                            Discover
                        </Link>
                        <Link
                            href="#"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-600 hover:border-gray-300 hover:text-gray-800"
                        >
                            For you
                        </Link>
                        <Link
                            href="/people"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-600 hover:border-gray-300 hover:text-gray-800"
                        >
                            People
                        </Link>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex gap-2 sm:items-center">
                    <!-- This Button Should Be Hidden on Mobile Devices -->
                    <Link
                        href="/post/create"
                        class="text-gray-900 hover:text-white border-2 border-gray-800 hover:bg-gray-900 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hidden md:block"
                    >
                        Create Post
                    </Link>

                    <button
                        type="button"
                        class="rounded-full bg-white p-2 text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                    >
                        <Message class="w-6 h-6" />
                    </button>

                    <button
                        type="button"
                        class="rounded-full bg-white p-2 text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                    >
                        <Notification class="w-6 h-6" />
                    </button>

                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button
                                type="button"
                                class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            >
                                <img
                                    class="h-8 w-8 rounded-full"
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                    alt="Ahmed Shamim Hasan Shaon"
                                />
                            </button>
                        </template>

                        <template #content>
                            <DropdownLink
                                :href="route('profile', { user: user.id })"
                            >
                                Your Profile
                            </DropdownLink>
                            <DropdownLink :href="route('profile.edit')">
                                Edit Profile
                            </DropdownLink>
                            <DropdownLink
                                as="button"
                                method="post"
                                :href="route('logout')"
                            >
                                Log Out
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>

                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button
                        type="button"
                        @click="mobileNav = !mobileNav"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                    >
                        <!-- Icon when menu is closed -->
                        <svg
                            v-if="!mobileNav"
                            class="block h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>

                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div v-if="mobileNav" class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 pt-2 pb-3">
                <Link
                    href="/"
                    class="block border-l-4 border-gray-800 bg-gray-50 py-2 pl-3 pr-4 text-base font-medium text-gray-700"
                >
                    Discover
                </Link>
                <Link
                    href="#"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700"
                >
                    For You
                </Link>
                <Link
                    href="/people"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700"
                >
                    People
                </Link>
            </div>

            <div class="border-t border-gray-200 pt-4 pb-3">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img
                            class="h-10 w-10 rounded-full"
                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                            alt="Ahmed Shamim Hasan Shaon"
                        />
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">
                            {{ `${user.first_name} ${user.last_name}` }}
                        </div>
                        <div class="text-sm font-medium text-gray-500">
                            {{ user.email }}
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <Link
                        href="/post/create"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800"
                    >
                        Create Post
                    </Link>
                    <Link
                        href="/profile/{{auth()->user()->id}}"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800"
                    >
                        Your Profile
                    </Link>
                    <Link
                        href="/edit-profile"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800"
                    >
                        Edit Profile
                    </Link>
                    <Link
                        as="button"
                        method="post"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800"
                        :href="route('logout')"
                    >
                        Log Out
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>
