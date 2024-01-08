<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import UserAvatar from "@/Icons/UserAvatar.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";

const { user, auth } = usePage().props;
const { avatar, first_name, last_name } = user.data;
</script>

<template>
    <Head title="User Profile" />
    <AppLayout class="max-w-xl mx-auto">
        <section
            class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[400px] space-y-8 flex items-center flex-col justify-center"
        >
            <img
                v-if="avatar"
                :src="avatar"
                class="h-28 w-28 rounded-full"
                alt="Ahmed Shamim Hasan Shaon"
            />
            <UserAvatar v-else class="h-28 w-28 text-gray-300" />

            <div
                class="flex gap-4 justify-center flex-col text-center items-center"
            >
                <div>
                    <h1 class="font-bold md:text-2xl">
                        {{ `${first_name} ${last_name}` }}
                    </h1>
                    <p class="text-gray-700">Less Talk, More Code 💻</p>
                </div>
            </div>

            <Link
                type="button"
                :href="route('profile.edit')"
                class="-m-2 flex gap-2 items-center rounded-full px-4 py-2 font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700"
                v-if="auth.user.id === user.data.id"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-5 h-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                    />
                </svg>

                Edit Profile
            </Link>
        </section>
    </AppLayout>
</template>
