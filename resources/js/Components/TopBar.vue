<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from './ApplicationLogo.vue';
import DropdownLink from './DropdownLink.vue';

</script>
<template>
    <div class="md:h-12 bg-brand-charade-600 flex items-center">
        <div
            class="container mx-auto flex flex-col space-y-2 px-4 md:px-10 md:space-y-0 md:flex-row items-center justify-between text-white md:h-12">
            <div class="text-md p-2 ">
                Havendo qualquer dúvida, entre em contato com nosso SAC <span class="font-bold">(17) 9 9126-6117</span>.
            </div>
            <div class=" py-2 md:py-0 block md:flex bg-brand-jade-500 h-full flex items-center px-5 space-x-3">
                <WhatsappIcon class="text-xl" />
                <span>SAC pelo Whatsapp</span>
            </div>
        </div>
    </div>

    <!-- Page Heading -->
    <header v-if="$page.props.auth.user" class="w-full bg-white border border-gray-400">
        <div class="container mx-auto flex items-center justify-between py-4 md:py-6 px-4 md:px-10">
            <div>
                <Link :href="route('dashboard')">
                    <ApplicationLogo class="w-32" />
                </Link>
            </div>

            <div>                
                <div
                    class="bg-white shadow dark:bg-gray-800"
                    v-if="$slots.header"
                >
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end ">
                <Link :href="route('profile.edit')" class=" w-[120px]">Editar Perfil</Link>

                <span>
                    <DropdownLink :href="route('logout')" method="post" as="button"
                        class="px-2 border rounded-lg flex items-center">
                        Sair
                    </DropdownLink>
                </span>
            </div>
        </div>
    </header>

</template>