<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";

const { post } = usePage().props;
const { description, user, comments } = post.data;
</script>

<template>
    <Head title="User Profile" />
    <AppLayout class="max-w-xl mx-auto">
        <article
            class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6"
        >
            <header>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <img
                                class="h-10 w-10 rounded-full object-cover"
                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                alt="Al Nahian"
                            />
                        </div>

                        <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                            <Link
                                :href="route('profile', user.id)"
                                class="hover:underline font-semibold line-clamp-1"
                            >
                                {{ `${user.first_name} ${user.last_name}` }}
                            </Link>

                            <Link
                                :href="route('profile', user.id)"
                                class="hover:underline text-sm text-gray-500 line-clamp-1"
                            >
                                {{ user.email }}
                            </Link>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="py-4 text-gray-700 font-normal">
                <p>{{ description }}</p>
            </div>

            <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
                <span class="">6 minutes ago</span>
                <span class="">•</span>
                <span>450 views</span>
            </div>

            <div class="pt-4 flex flex-col gap-6">
                <div v-for="comment in comments">
                    <div class="flex items-center space-x-3">
                        <img
                            class="h-7 w-7 rounded-full object-cover"
                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                            alt="Al Nahian"
                        />

                        <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                            <p class="font-semibold line-clamp-1 text-sm">
                                {{
                                    `${comment.user.first_name} ${comment.user.last_name}`
                                }}
                            </p>

                            <p class="text-gray-500 line-clamp-1 text-xs">
                                {{ comment.user.email }}
                            </p>
                        </div>
                    </div>

                    <div class="pl-10 pt-2">
                        <p class="text-sm">{{ comment.comment }}</p>
                    </div>
                </div>
            </div>
        </article>
    </AppLayout>
</template>
