<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard do admin" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard do admin
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10 flex flex-col space-y-5">
                <Link class="p-4 bg-brand-nile-blue-500 text-white shadow-md text-xl" :href="route('admin.trains.index')">Cadastro de treinos</Link>
                <Link class="p-4 bg-brand-nile-blue-500 text-white shadow-md text-xl" :href="route('admin.meals.index')">Cadastro de refeições</Link>
                <!-- <Link :href="route('admin.trains.index')">Treinos</Link> -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>
