<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Button from "@/Components/Button.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
import EditButton from "@/Components/EditButton.vue";
import SaveButton from "@/Components/SecondaryButton.vue";
import { Head } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

defineProps({ providers: Object });

const form = useForm({
    id: "",
});

const destroy = (id) => {
    form.delete(route("providers.delete",id));
}

</script>

<template>
    <Head title="Providers" />

    <AuthenticatedLayout>
        <template #header>
            <div class="container columns-2">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Providers
                    </h2>
                </div>
                <div class="flex justify-end">
                    <Button title="Add Provider" :href="route('providers.create')"/>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <ul v-for="provider in providers" role="list" class="divide-y divide-gray-100 p-3">
                        <li class=" container columns-2 flex justify-between gap-x-6 py-5 p-2">
                            <div  class="flex gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        {{ provider.name }} {{ provider.last_name }}
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                        {{ provider.email }}
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                        {{ provider.phone }}
                                    </p>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <EditButton title="Editar" :href="route('providers.edit',provider.id)"/>
                                <DeleteButton @click="destroy(provider.id)" title="Excluir"/>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
