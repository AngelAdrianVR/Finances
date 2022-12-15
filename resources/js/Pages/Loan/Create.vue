<template>
    <AppLayout title="Crear Registro de Préstamo">
    <div class="flex space-x-7 ml-2">
        <Link :href="route('loans.index')" class="flex items-center mt-2 text-indigo-600">
            <i class="fas fa-long-arrow-alt-left text-lg"></i>
            <span class="ml-2">Atrás</span>
        </Link>
        <header class="block text-3xl text-gray-100 bg-stone-900 mt-5">Crear Registro de Prestamo</header>
    </div>
       <div class="container mx-auto bg-stone-700 rounded-lg h-90 mt-8 w-[90%]">


            <form @submit.prevent="store" class="mt-6">
        <div class="lg:grid grid-cols-2 gap-x-3 transition-dark dark:bg-slate-900 flex flex-row justify-center">
          <div class="mt-3 text-center">
            <InputLabel class="dark:text-gray-300 mx-4 my-2 text-lg" value="Cantidad" />
            <TextInput
                    id="quantity"
                    v-model="form.quantity"
                    type="number"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />

            <InputLabel class="dark:text-gray-300 mx-4 my-2 text-lg" value="Deudor" />
            <TextInput
                    id="debtor"
                    v-model="form.debtor"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />

            <InputLabel class="dark:text-gray-300 mx-4 my-2 text-lg" value="Fecha promesa de pago" />
            <TextInput
                    id="pay_date"
                    v-model="form.pay_date"
                    type="date"
                    class="mt-1 block w-full"
                    required
                />
                <InputError :message="$page.props?.errors.pay_date" />
                <PrimaryButton :disabled="form.processing" class="my-4 bg-stone-800">Agregar</PrimaryButton>
        </div>
     </div>
      </form>
       </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';

export default {
    data(){
        const form = useForm({
        quantity: null,
        debtor: "",
        pay_date: "",
      
      })
        return {
            form
        }
        
      },
    components:{
        AppLayout,
        PrimaryButton,
        InputLabel,
        TextInput,
        Link,
        useForm,
        InputError,
    },
    props:{

    },
    methods:{
        store() {
      this.form.post(this.route('loans.store'));
    },
    },
}
</script>