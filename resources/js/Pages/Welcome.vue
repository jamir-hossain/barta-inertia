<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import HorizontalMore from "@/Icons/HorizontalMore.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

const { posts, auth } = usePage().props;
</script>

<template>
    <Head title="Welcome" />

    <AppLayout class="max-w-xl mx-auto space-y-8">
        <article
            :key="post.id"
            v-for="post in posts.data"
            class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6"
        >
            <!-- Barta Card Top -->
            <header>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <img
                                v-if="post.user.avatar"
                                class="h-10 w-10 rounded-full object-cover"
                                :src="post.user.avatar"
                                alt="Al Nahian"
                            />
                            <img
                                v-else
                                class="h-10 w-10 rounded-full object-cover"
                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                alt="Al Nahian"
                            />
                        </div>

                        <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                            <Link
                                :href="`/profile/${post.user.id}`"
                                class="hover:underline font-semibold line-clamp-1"
                            >
                                {{
                                    `${post.user.first_name} ${post.user.last_name}`
                                }}
                            </Link>

                            <Link
                                :href="`/profile/${post.user.id}`"
                                class="hover:underline text-sm text-gray-500 line-clamp-1"
                            >
                                {{ post.user.email }}
                            </Link>
                        </div>
                    </div>

                    <Dropdown
                        width="48"
                        align="right"
                        v-if="auth.user.id === post.user.id"
                    >
                        <template #trigger>
                            <button
                                type="button"
                                class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            >
                                <HorizontalMore class="w-5 h-5" />
                            </button>
                        </template>

                        <template #content>
                            <DropdownLink :href="`post/${post.id}/edit`">
                                Edit
                            </DropdownLink>
                            <DropdownLink
                                as="button"
                                method="delete"
                                :href="`post/${post.id}`"
                            >
                                Delete
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </header>

            <!-- Content -->
            <div class="py-4 text-gray-700 font-normal">
                <img
                    alt=""
                    class="mb-4"
                    v-if="post.avatar"
                    :src="post.avatar"
                />

                <p>{{ post.description }}</p>
            </div>

            <!-- Date Created & View Stat -->
            <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
                <span>6 minutes ago</span>
                <span>•</span>
                <span>450 views</span>
                <Link
                    :href="`/post/${post.id}`"
                    class="text-blue-600 font-medium bg-gray-100 px-2 py-0.5 rounded"
                >
                    View Post ->
                </Link>
            </div>

            <form method="POST" action="/post/comment/{{post.id}}">
                <div class="flex">
                    <input
                        required
                        type="text"
                        name="comment"
                        placeholder="Write your comment"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
                    />
                    <button
                        type="submit"
                        class="max-w-[100px] justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                    >
                        Submit
                    </button>
                </div>
            </form>

            <div class="pt-4 flex flex-col gap-6">
                <div v-for="comment in post.comments">
                    <div class="flex items-center space-x-3">
                        <img
                            alt="Al Nahian"
                            :src="comment.user.avatar"
                            v-if="comment.user.avatar"
                            class="h-7 w-7 rounded-full object-cover"
                        />
                        <img
                            v-else
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

        <!-- <div class="flex items-center justify-center gap-4">
            <Link
                :href="posts.links.prev"
                class="text-blue-600 font-medium bg-gray-100 px-4 py-1.5 rounded"
            >
                {{ "Load Prev" }}
            </Link>
            <Link
                :href="posts.links.next"
                class="text-blue-600 font-medium bg-gray-100 px-4 py-1.5 rounded"
            >
                {{ "Load More" }}
            </Link>
        </div> -->
    </AppLayout>
</template>
