<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10">
                <div
                    class="overflow-hidden sm:rounded-lg space-y-11"
                >
                    <div class=" text-brand-charade-400 text-mg"> Olá <span class="font-bold">{{ $page.props.auth?.user?.name }}</span>! Seja Bem-vindo! </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class=" bg-brand-nile-blue-500 p-8 rounded-xl space-y-5">
                            <img src="/assets/images/gym1.jpg" class="w-full max-h-[160px] object-cover" alt="">
                            <div class="text-2xl text-center text-white">Treinos</div>
                        </div>

                        <div class=" bg-brand-nile-blue-500 p-8 rounded-xl space-y-5">
                            <img src="/assets/images/fruits.jpg" class="w-full max-h-[160px] object-cover" alt="">
                            <div class="text-2xl text-center text-white">Plano nutricional</div>
                        </div>

                        <div class=" bg-brand-nile-blue-500 p-8 rounded-xl space-y-5">
                            <img src="/assets/images/gym3.jpg" class="w-full max-h-[160px] object-cover" alt="">
                            <div class="text-2xl text-center text-white">Progresso</div>
                        </div>
                    </div>

                    <div class="border-t"></div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class=" bg-white shadow-md p-8 rounded-xl space-y-3">
                           <div class="text-lg">Treinos concluídos / semana</div>
                            <div class="text-5xl font-bold text-brand-nile-blue-500">3</div>
                        </div>

                        <div class=" bg-white shadow-md p-8 rounded-xl space-y-3">
                            <div class="text-lg">Treinos disponíveis</div>
                            <div class="text-5xl font-bold text-brand-nile-blue-500">5</div>
                        </div>

                       <div class=" bg-white shadow-md p-8 rounded-xl space-y-3">
                            <div class="text-lg">Treinos restantes</div>
                            <div class="text-5xl font-bold text-brand-nile-blue-500">2</div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
