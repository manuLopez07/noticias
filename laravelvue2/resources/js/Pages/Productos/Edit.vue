<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";

    const props = defineProps({
        productos: {
            type: Object,
            default: () => ({}),
        },
    });

    const form = useForm({
        id: props.productos.id,
        name: props.productos.name,
        namem: props.productos.namem,
        inventario: props.productos.inventario,
    });


    const submit = () => {
        form.put(route("productos.update", props.productos.id));
    };
    </script>

    <template>
        <Head title="Book Edit" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Editar productos
                </h2>
            </template>

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form @submit.prevent="submit">
                                <div class="mb-6">
                                    <label
                                        for="Name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Nombre</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.name"
                                        name="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Nombre del producto"
                                    />
                                    <div
                                        v-if="form.errors.name"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.name }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="namem"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Marca</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.namem"
                                        name="namem"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Nombre de la marca"
                                    />
                                    <div
                                        v-if="form.errors.namem"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.namem }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="inventario"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Inventario</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.inventario"
                                        name="inventario"
                                        id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >

                                    <div
                                        v-if="form.errors.inventario"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.inventario }}
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                    :disabled="form.processing"
                                    :class="{ 'opacity-25': form.processing }"
                                >
                                    Guardar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </template>
