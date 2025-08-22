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


</script>

<template>

    <Head title="Refeições do Dia" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Refeições do Dia
            </h2>
        </template>

        <div class="py-12">
            <div class="container px-4 md:px-10">

                <div class="text-3xl text-gray-600 font-bold text-center mb-4">
                    Refeições do Dia
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 text-gray-600">
                    <div class=" md:col-span-2 space-y-4">
                        <div class="bg-white border p-3 rounded-md" v-for="(meal, index) in meals" :key="index">
                            <div class="text-gray-600 font-bold text-xl">{{ meal.name }}</div>
                            <div v-html="meal.description"></div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-blue-200 p-5 rounded-xl">
                            Tente fazer da sua
                            refeição um momento
                            de <span class="font-bold">pausa</span> e <span class="font-bold">presença</span>.
                            Coma devagar,
                            apreciando cada sabor
                            -isso <span class="font-bold">faz bem</span> para o
                            corpo e para a mente.
                        </div>

                        <div class="bg-yellow-200 p-5 rounded-xl">
                            Em meio à correria do dia a
                            dia, fazer uma pausa para se
                            alimentar é um dos gestos
                            mais simples - e poderosos
                            - de cuidado consigo
                            mesmo. Mais do que apenas
                            ingerir alimentos, a refeição é
                            um ritual de conexão: com
                            seu corpo, seus sentidos e o
                            momento presente. Reserve
                            alguns minutos para se
                            desligar das preocupações e
                            focar no agora. Sente-se
                            confortavelmente, respire
                            fundo e observe seu prato: as
                            cores, os aromas, as texturas.
                            Coma devagar, apreciando
                            cada garfada como uma
                            pequena celebração da vida.
                            Permita-se sentir gratidäo por
                            cada ingrediente e pelo
                            caminho que ele percorreu
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
