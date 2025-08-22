<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    trains: {
        type: Object,
        default: () => ({})
    }
})

const form = useForm({id: null});
const saveTrain = (id) => {
    form.id = id;
    form.post(route('client.trains.save', id), {
        onSuccess: () => {
            // location.reload();
        }
    });
}

</script>

<template>

    <Head title="Treinos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Treinos
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10">

                <div class="text-3xl text-gray-600 font-bold text-center mb-4">
                    Seus treinos de hoje
                </div>

                <div class="text-center text-lg mb-8">
                    Membros superiores
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div v-for="(train, index) in trains" :key="index" class="shadow-md rounded-lg bg-white p-5 space-y-4 text-gray-600">
                        <div class="text-gray-600 font-bold text-xl">{{ train.name }}</div>

                        <div>
                            <img src="/assets/images/train-img.png" class="w-full h-[200px] object-cover" alt="">
                        </div>

                        <div class="flex items-center space-x-3">
                            <span>Realizado </span> 
                            <div class="w-[50px] block h-6 rounded-xl flex shadow-md cursor-pointer" @click="saveTrain(train.id)" :class="{'bg-green-500 justify-end': train.trained_today, 'bg-red-600': !train.trained_today}">
                                <span class="h-full bg-white w-[25px] rounded-full "></span>
                            </div>
                        </div>

                        <div class="">
                            <div class="font-bold">Meta</div>
                            <div class="flex rounded-lg text-white">
                                <div class="h-7 bg-green-700 flex items-center justify-center rounded-l-lg" :style="{'width':train.progress + '%'}"> {{ train.current }} dia(s) </div>
                                <div class="h-7 bg-red-600 flex items-center justify-center rounded-r-lg flex-grow"> {{ train.goal - train.current }} dias(s) </div>
                            </div>
                        </div>

                         <div class="border-2 rounded-xl p-2 shadow-sm hover:shadow-lg cursor-pointer duration-150 border-brand-nile-blue-300 text-center text-lg font-bold">
                            Detalhes
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </AuthenticatedLayout>
</template>
