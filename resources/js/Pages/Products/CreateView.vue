<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SaveButton from "@/Components/SecondaryButton.vue";
import NameProduct from "@/Components/TextInput.vue";
import NameProductLabel from "@/Components/InputLabel.vue";
import DescriptionName from "@/Components/TextInput.vue";
import ImageName from "@/Components/TextInput.vue";
import DescriptionProductLabel from "@/Components/InputLabel.vue";
import { Head } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import { Link, useForm, usePage } from "@inertiajs/vue3";

const form = useForm({
    product_name: "",
    description: "",
    image: "",
});

const submit = () => {
    form.post(route("products.store"));
};
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container grid grid-cols-1 grid-rows-4 gap-10 p-2">
                        <form @submit.prevent="submit" class="mt-6 space-y-6">
                            <div>
                                <NameProductLabel value="Name" />
                                <NameProduct
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.product_name"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <DescriptionProductLabel value="Description" />
                                <DescriptionName id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <ImageName id="image"
                                    type="file"
                                    @input="form.image = $event.target.files[0]"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
