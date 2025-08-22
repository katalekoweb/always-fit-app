<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    meals: {
        type: Object,
        default: () => ({})
    }
})

const form = useForm({id: null});
const deleteRecord = (id) => {
    if (confirm('Tem certeza que deseja excluir este treino?')) {
        form.delete(route('admin.meals.destroy', id), {
            onSuccess: () => {
                alert('Refição excluída com sucesso.');
                location.reload();
            }
        });
    }
}

</script>

<template>

    <Head title="Refeições" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Refeições
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10">

                <div class="flex items-center justify-end mb-3">
                    <Link class="px-4 py-2 bg-brand-nile-blue-500 text-white rounded-lg shadow-md"
                        :href="route('admin.meals.create')">Nova refeição</Link>
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Cliente</th>
                                <th>Nome</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="props.meals.data.length == 0">
                                <td colspan="4" class="text-center p-4">Nenhuma refeição encontrada.</td>
                            </tr>
                            <tr v-for="(meal, index) in meals.data" :key="index" class="border-t">
                                <td class="p-4">{{ meal.id }}</td>
                                <td class="p-4">{{ meal.user?.name }}</td>
                                <td class="p-4">{{ meal.name }}</td>
                                <td class="p-4 text-right space-x-2 flex items-center">
                                    <Link :href="route('admin.meals.edit', meal.id)"
                                        class=" text-brand-nile-blue-400 hover:underline">
                                    Editar</Link>
                                    <PrimaryButton @click="deleteRecord(meal.id)">Excluir</PrimaryButton>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
