<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Footer.vue';
import WhatsappIcon from '@/Components/Icons/WhatsappIcon.vue';

import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex min-h-screen flex-col">

        <div class="md:h-12 bg-brand-charade-600 flex items-center">
            <div class="container mx-auto flex flex-col space-y-2 md:space-y-0 md:flex-row items-center justify-between text-white md:h-12">
                <div class="text-md p-2 px-4">
                    Havendo qualquer dúvida, entre em contato com nosso SAC <span class="font-bold">(17) 9 9126-6117</span>.
                </div>
                <div class=" py-2 md:py-0 block md:flex bg-brand-jade-500 h-full flex items-center px-5 space-x-3"> 
                    <WhatsappIcon class="text-xl" />
                    <span>SAC pelo Whatsapp</span>
                </div>
            </div>
        </div>

        <div class="w-full  flex-grow flex flex-col items-center justify-center bg-white py-24 md:py-52 sm:justify-center dark:bg-gray-900">

            <div
                class="space-y-10 w-full overflow-hidden border border-gray-200 bg-brand-whisper-400 px-6 py-4 shadow-xl sm:max-w-xl sm:rounded-lg dark:bg-gray-800">
                <div>
                    <Link href="/">
                    <ApplicationLogo class=" w-48 mx-auto fill-current text-gray-500" />
                    </Link>
                </div>

                <div class="">
                    <slot />
                </div>
            </div>

        </div>

        <Footer />

    </div>

</template>
