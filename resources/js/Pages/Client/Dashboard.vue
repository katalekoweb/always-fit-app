<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    stats: {
        type: Object,
        default: () => ({})
    }
});
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
                        <Link :href="route('client.trains')" class=" bg-brand-nile-blue-500 p-8 rounded-xl space-y-5">
                            <img src="/assets/images/gym1.jpg" class="w-full max-h-[160px] object-cover" alt="">
                            <div class="text-2xl text-center text-white">Treinos</div>
                        </Link>

                        <Link :href="route('client.meals')" class=" bg-brand-nile-blue-500 p-8 rounded-xl space-y-5">
                            <img src="/assets/images/fruits.jpg" class="w-full max-h-[160px] object-cover" alt="">
                            <div class="text-2xl text-center text-white">Plano nutricional</div>
                        </Link>

                        <Link :href="route('client.progress')" class=" bg-brand-nile-blue-500 p-8 rounded-xl space-y-5">
                            <img src="/assets/images/gym3.jpg" class="w-full max-h-[160px] object-cover" alt="">
                            <div class="text-2xl text-center text-white">Progresso</div>
                        </Link>
                    </div>

                    <div class="border-t"></div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class=" bg-white shadow-md p-8 rounded-xl space-y-3">
                           <div class="text-lg">Treinos concluídos / semana</div>
                            <div class="text-5xl font-bold text-brand-nile-blue-500"> {{ stats.total_week_trained }} </div>
                        </div>

                        <div class=" bg-white shadow-md p-8 rounded-xl space-y-3">
                            <div class="text-lg">Treinos disponíveis</div>
                            <div class="text-5xl font-bold text-brand-nile-blue-500"> {{ stats.total_available_trains }} </div>
                        </div>

                       <div class=" bg-white shadow-md p-8 rounded-xl space-y-3">
                            <div class="text-lg">Treinos restantes</div>
                            <div class="text-5xl font-bold text-brand-nile-blue-500">  {{ stats.total_remaining_trains }} </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
