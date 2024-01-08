<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";

const { post } = usePage().props;

const form = useForm({
    image: post.data.image,
    description: post.data.description,
});

const submit = () => {
    form.put(`/post/${post.data.id}`);
};
</script>

<template>
    <Head title="User Profile" />
    <AppLayout class="max-w-xl mx-auto">
        <form
            @submit.prevent="submit"
            class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6"
        >
            <h5 class="font-medium text-xl">Update Post</h5>

            <div class="mt-6">
                <InputLabel for="image" value="Post Image" />

                <input
                    id="image"
                    type="file"
                    @input="form.image = $event.target.files[0]"
                    class="mt-2 block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
                />

                <InputError class="mt-2" :message="form.errors.image" />
            </div>

            <div class="mt-6">
                <InputLabel for="description" value="Post Description" />

                <textarea
                    rows="3"
                    id="description"
                    v-model="form.description"
                    placeholder="Write your post here..."
                    class="mt-2 block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                ></textarea>

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <button
                type="submit"
                class="mt-8 flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
            >
                Submit Post
            </button>
        </form>
    </AppLayout>
</template>
