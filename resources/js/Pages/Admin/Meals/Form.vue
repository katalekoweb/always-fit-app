<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    meal: {
        type: Object,
        default: () => ({})
    },
    users: {
        type: Object,
        default: () => ({})
    },
})

const form = useForm({
    name: props.meal.name,
    description: props.meal.description,
    user_id: props.meal.user_id,
    active: props.meal.active ?? true,
    start_date: props.meal.start_date,
    end_date: props.meal.end_date,
    every_day: props.meal.every_day ?? 1,
    week_days: props.meal.week_days ?? [],
    active: props.meal.active ?? 1,
});

const saveForm = () => {
    if (props.meal.id) {
        form.put(route('admin.meals.update', props.meal.id));
    } else {
        form.post(route('admin.meals.store'));
    }
}

</script>

<template>

    <Head :title="meal.id ? 'Editar refeição' : 'Cadastrar refeição'" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ meal.id ? 'Editar refeição' : 'Cadastrar refeição' }}
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10">

                <div class="flex items-center justify-end mb-3">
                    <Link class="px-4 py-2 bg-brand-nile-blue-500 text-white rounded-lg shadow-md"
                        :href="route('admin.meals.index')">Voltar</Link>
                </div>

                <div class="bg-white p-5 shadow-md rounded-xl">

                    <div class="grid grid-cols-2 gap-8">

                        <div>
                            <InputLabel for="user_id" value="Cliente" />
                            <select class="w-full border border-gray-400 rounded-lg p-2 mt-1" name="user_id" id="user_id" v-model="form.user_id">
                                <option value="">Selecionar</option>
                                <option v-for="(user, index) in users" :key="index" :value="user.id">{{ user.name }}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.user_id" />
                        </div>

                        <div>
                            <InputLabel for="name" value="Nome" />
                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                                autocomplete="name" />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div>
                            <InputLabel for="start_date" value="Data de início" />
                            <TextInput id="start_date" type="date" class="mt-1 block w-full" v-model="form.start_date" />
                            <InputError class="mt-2" :message="form.errors.start_date" />
                        </div>

                        <div>
                            <InputLabel for="end_date" value="Data de término" />
                            <TextInput id="end_date" type="date" class="mt-1 block w-full" v-model="form.end_date" />
                            <InputError class="mt-2" :message="form.errors.end_date" />
                        </div>

                        <div>
                            <InputLabel for="every_day" value="Todos os dias" />
                            <select class="w-full border border-gray-400 rounded-lg p-2 mt-1" name="every_day" id="every_day" v-model="form.every_day">
                                <option value="">Selecionar</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.every_day" />
                        </div>

                        <div v-if="form.every_day == 0">
                            <InputLabel for="week_days" value="Dias da semana" />
                            <select multiple class="w-full border border-gray-400 rounded-lg p-2 mt-1" name="week_days" id="week_days" v-model="form.week_days">
                                <option value="">Selecionar</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.week_days" />
                        </div>

                        <div>
                            <InputLabel for="active" value="Ativo" />
                            <select class="w-full border border-gray-400 rounded-lg p-2 mt-1" name="active" id="active" v-model="form.active">
                                <option value="">Selecionar</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.active" />
                        </div>

                        <div class="col-span-2">
                            <InputLabel for="description" value="Descrição" />
                            <textarea id="description" type="text" class="mt-1 block w-full border border-gray-200 rounded-xl" v-model="form.description"></textarea>
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton @click="saveForm()">Salvar</PrimaryButton>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
