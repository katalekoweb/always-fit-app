<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Footer.vue';
import WhatsappIcon from '@/Components/Icons/WhatsappIcon.vue';
import TopBar from '@/Components/TopBar.vue';

import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex min-h-screen flex-col">

        <TopBar />

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
