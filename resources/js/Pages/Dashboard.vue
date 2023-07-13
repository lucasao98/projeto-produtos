<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    products: Object,
    providers: Object
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul v-for="provider in providers" role="list" class="divide-y divide-gray-100 p-3">
                            <li class=" container columns-2 flex justify-between gap-x-6 py-5 p-2">
                            <div  class="flex gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        {{ provider.provider_name }} {{ provider.last_name }}
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                        {{ provider.email }}
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                        {{ provider.phone }}
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                        {{ provider.product_name }}
                                    </p>
                                </div>
                            </div>
                            <div class="grid">
                                <label for="">Produtos</label>
                                <select>
                                    <option>{{ provider.product_name }}</option>
                                </select>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
