<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Button from "@/Components/Button.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
import EditButton from "@/Components/EditButton.vue";
import SaveButton from "@/Components/SecondaryButton.vue";
import { Head } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

defineProps({ products: Object });

const form = useForm({
    id: "",
});

const destroy = (id) => {
    form.delete(route("products.delete",id));
}

</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <div class="container columns-2">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Products
                    </h2>
                </div>
                <div class="flex justify-end">
                    <Button title="Add Products" :href="route('products.create')"/>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <ul v-for="product in products" role="list" class="divide-y divide-gray-100 p-3">
                        <li class=" container columns-2 flex justify-between gap-x-6 py-5 p-2">
                            <div  class="flex gap-x-4">
                                <img
                                    class="h-12 w-12 flex-none bg-gray-50"
                                    src="{{product.path_image }}"
                                />
                                <div class="min-w-0 flex-auto">
                                    <p
                                        class="text-sm font-semibold leading-6 text-gray-900"
                                    >
                                        {{product.product_name}}
                                    </p>
                                    <p
                                        class="mt-1 truncate text-xs leading-5 text-gray-500"
                                    >
                                        {{product.description}}
                                    </p>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <EditButton title="Editar" :href="route('products.edit',product.id)"/>
                                <DeleteButton @click="destroy(product.id)" title="Excluir"/>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
