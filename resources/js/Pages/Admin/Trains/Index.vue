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

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Cadastro de Treinos
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10">

                <div class="flex items-center justify-end mb-3">
                    <Link class="px-4 py-2 bg-brand-nile-blue-500 text-white rounded-lg shadow-md"
                        :href="route('admin.trains.create')">Novo Treino</Link>
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Cliente</th>
                                <th>Nome</th>
                                <th>Meta</th>
                                <th>Andamento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="props.trains.data.length == 0">
                                <td colspan="6" class="text-center p-4">Nenhum treino encontrado.</td>
                            </tr>
                            <tr v-for="(train, index) in trains.data" :key="index" class="border-t">
                                <td class="p-4">{{ train.id }}</td>
                                <td class="p-4">{{ train.user?.name }}</td>
                                <td class="p-4">{{ train.name }}</td>
                                <td class="p-4">{{ train.goal }}</td>
                                <td class="p-4">{{ train.current }}</td>
                                <td class="p-4 text-right space-x-2 flex items-center">
                                    <Link :href="route('admin.trains.edit', train.id)"
                                        class=" text-brand-nile-blue-400 hover:underline">
                                    Editar</Link>
                                    <PrimaryButton @click="deleteRecord(train.id)">Excluir</PrimaryButton>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
