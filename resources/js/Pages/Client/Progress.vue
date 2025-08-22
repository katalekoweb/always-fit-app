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
const deleteRecord = (id) => {
    if (confirm('Tem certeza que deseja excluir este treino?')) {
        form.delete(route('admin.trains.destroy', id), {
            onSuccess: () => {
                alert('Treino excluído com sucesso.');
                location.reload();
            }
        });
    }
}

</script>

<template>

    <Head title="Cadastro de Treinos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Cadastro de Treinos
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div v-for="(train, index) in trains" :key="index" class="shadow-md rounded-lg bg-white p-5 space-y-4">
                        <div class="text-gray-600 font-bold text-xl">{{ train.name }}</div>

                        <div v-html="train.description"></div>

                        <div class="font-bold">
                            <span>Iniciado:</span> {{ train.formated_start_date }}
                        </div>

                        <div class="">
                            <div class="font-bold">Meta</div>
                            <div class="flex rounded-lg text-white">
                                <div class="h-7 bg-green-700 flex items-center justify-center rounded-l-lg" :style="{'width':train.progress + '%'}"> {{ train.current }} dias </div>
                                <div class="h-7 bg-red-600 flex items-center justify-center rounded-r-lg flex-grow"> {{ train.goal - train.current }} dias </div>
                            </div>
                        </div>


                    </div>
                </div>
                
            </div>
        </div>
    </AuthenticatedLayout>
</template>
