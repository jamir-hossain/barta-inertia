<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import UserAvatar from "@/Icons/UserAvatar.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const { user } = usePage().props;
const { avatar, first_name, last_name, email } = user.data;

const form = useForm({
    avatar: null,
    first_name,
    last_name,
    email,
    current_password: "",
    password: "",
    password_confirmation: "",
    bio: null,
});

const submit = () => {
    form.post(route("profile.update"), {
        onFinish: () =>
            form.reset("password", "current_password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Welcome" />
    <AppLayout class="max-w-xl mx-auto">
        <h2 class="text-xl font-semibold leading-7 text-gray-900">
            Edit Profile
        </h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">
            This information will be displayed publicly so be careful what you
            share.
        </p>

        <form
            @submit.prevent="submit"
            enctype="multipart/form-data"
            class="grid grid-cols-2 gap-y-8 gap-x-6"
        >
            <div class="col-span-full">
                <InputLabel for="photo" value="Photo" />

                <div>
                    <input
                        class="hidden"
                        type="file"
                        name="avatar"
                        id="avatar"
                    />

                    <img
                        v-if="avatar"
                        :src="avatar"
                        class="h-28 w-28 rounded-full"
                        alt="Ahmed Shamim Hasan Shaon"
                    />
                    <UserAvatar v-else class="h-28 w-28 text-gray-300" />

                    <label
                        for="avatar"
                        class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                    >
                        Change Photo
                    </label>
                </div>

                <InputError class="mt-2" :message="form.errors.avatar" />
            </div>

            <div class="col-span-full md:col-span-1">
                <InputLabel for="first_name" value="First Name" />

                <TextInput
                    id="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.first_name"
                    required
                    autofocus
                    autocomplete="first_name"
                />

                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>

            <div class="col-span-full md:col-span-1">
                <InputLabel for="last_name" value="Last Name" />

                <TextInput
                    id="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.last_name"
                    required
                    autofocus
                    autocomplete="last_name"
                />

                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>

            <div class="col-span-full">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="col-span-full">
                <InputLabel for="current_password" value="Current Password" />

                <TextInput
                    id="current_password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.current_password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="col-span-full">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="col-span-full">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="col-span-full">
                <InputLabel for="bio" value="Your Short Bio" />

                <div class="mt-2">
                    <textarea
                        id="bio"
                        name="bio"
                        rows="3"
                        v-model="form.bio"
                        placeholder="Write a few sentences about yourself."
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                    ></textarea>
                </div>

                <InputError class="mt-2" :message="form.errors.bio" />
            </div>

            <div class="col-span-full mt-6 flex items-center justify-end gap-6">
                <SecondaryButton type="button">Cancel</SecondaryButton>
                <PrimaryButton type="submit">Save Changes</PrimaryButton>
            </div>
        </form>
    </AppLayout>
</template>
