<script setup>
import Navbar from "@/Layouts/Partials/Navbar.vue";
import Footer from "@/Layouts/Partials/Footer.vue";

defineProps({
    class: {
        type: String,
    },
});
</script>

<template>
    <body class="container min-h-screen">
        <Navbar />

        <main class="px-5 py-8" :class="class">
            <slot />
        </main>

        <Footer />
    </body>
</template>
