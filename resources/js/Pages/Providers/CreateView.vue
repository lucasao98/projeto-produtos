<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SaveButton from "@/Components/SecondaryButton.vue";
import NameProduct from "@/Components/TextInput.vue";
import NameProductLabel from "@/Components/InputLabel.vue";
import LastName from "@/Components/TextInput.vue";
import LastNameLabel from "@/Components/InputLabel.vue";
import Email from "@/Components/TextInput.vue";
import EmailLabel from "@/Components/InputLabel.vue";
import Phone from "@/Components/TextInput.vue";
import PhoneLabel from "@/Components/InputLabel.vue";
import ProductLabel from "@/Components/InputLabel.vue";
import SelectProduct from '@/Components/Dropdown.vue';
import { Head } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import { Link, useForm, usePage } from "@inertiajs/vue3";

defineProps({ products: Object });

const form = useForm({
    provider_name: "",
    last_name: "",
    email: "",
    phone: "",
    product_id: ""
});

const submit = () => {
    form.post(route("providers.store"));
};
</script>

<template>
    <Head title="Providers"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add New Provider
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
                                    id="product_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.provider_name"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <LastNameLabel value="Last Name" />
                                <LastName id="last_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.last_name"
                                    required
                                    autofocus
                                />
                            </div>

                             <div>
                                <EmailLabel value="Email" />
                                <Email id="email"
                                    type="text"
                                    class="mt-1 block w-50"
                                    v-model="form.email"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <PhoneLabel value="Phone" />
                                <Phone id="phone"
                                    type="text"
                                    class="mt-1 block w-25"
                                    v-model="form.phone"
                                    required
                                    autofocus
                                />
                            </div>

                            <div>
                                <ProductLabel value="Product" />
                                <select name="product" id="product" v-model="form.product_id">
                                    <option v-for="product in products" v-bind:value="product.id">
                                        {{product.name}}
                                    </option>
                                </select>
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
