<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";

    const props = defineProps({
        envio: {
            type: Object,
            default: () => ({}),
        },
    });

    const form = useForm({
        id: props.envio.id,
        idcliente: props.envio.idcliente,
        idpaquete: props.envio.idpaquete,
        domicilio: props.envio.domicilio,
        envio: props.envio.envio,
    });


    const submit = () => {
        form.put(route("envios.update", props.envio.id));
    };
    </script>

    <template>
        <Head title="Book Edit" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Editar envio
                </h2>
            </template>

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form @submit.prevent="submit">
                                <div class="mb-6">
                                    <label
                                        for="idcliente"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Numero de cliente</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.idcliente"
                                        name="idcliente"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Numero de cliente"
                                    />
                                    <div
                                        v-if="form.errors.idcliente"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.idcliente }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="idpaquete"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Numero de paquete</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.idpaquete"
                                        name="idpaquete"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="idpaquete"
                                    />
                                    <div
                                        v-if="form.errors.idpaquete"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.idpaquete }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="domicilio"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Domicilio</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.domicilio"
                                        name="domicilio"
                                        id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >

                                    <div
                                        v-if="form.errors.domicilio"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.domicilio }}
                                    </div>
                                    </div>

<div class="mb-6">
                                    <label
                                        for="envio"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Envio</label
                                    >
                                    <div>
                                        <input type="radio" value="Sin enviar" v-model="form.envio" class="p-1 mx-2" >
                                        <label for="estado1">Sin enviar</label>
                                        <input type="radio" value="En camino" v-model="form.envio" class="p-1 mx-2" >
                                        <label for="estado1">En camino</label>
                                        <input type="radio" value="Entregado" v-model="form.envio" class="p-1 mx-2" >
                                        <label for="estado1">Entregado</label>
                                    </div>

                                    <div
                                        v-if="form.errors.envio"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.envio }}
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
