<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="#" class="text-center text-6xl font-bold text-gray-900">
                <h1>Barta</h1>
            </a>

            <h1
                class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
            >
                Sign in to your account
            </h1>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <InputLabel for="password" value="Password" />
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Forgot Password?
                        </Link>
                    </div>

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox
                            name="remember"
                            v-model:checked="form.remember"
                        />
                        <span class="ms-2 text-sm text-gray-600">
                            Remember me
                        </span>
                    </label>
                </div>

                <PrimaryButton
                    class="mt-4 w-full"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Don't have an account yet?
                <Link
                    href="/register"
                    class="font-semibold leading-6 text-black hover:text-black"
                >
                    Sign Up
                </Link>
            </p>
        </div>
    </GuestLayout>
</template>
