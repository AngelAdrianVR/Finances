<template>
    <AppLayout title="Crear Ingreso">
    <div class="flex space-x-7 ml-2">
        <Link :href="route('incomes.index')" class="flex items-center mt-2 text-indigo-600">
            <i class="fas fa-long-arrow-alt-left text-lg"></i>
            <span class="ml-2">Atrás</span>
        </Link>
        <header class="block text-3xl text-gray-100 bg-stone-900 mt-5">Crear Ingreso</header>
    </div>
       <div class="container mx-auto bg-stone-700 rounded-lg h-60 mt-8 w-[90%]">


            <form @submit.prevent="store" class="mt-6">
        <div class="lg:grid grid-cols-2 gap-x-3 transition-dark dark:bg-slate-900 flex flex-row justify-center">
          <div class="mt-3 text-center">
            <InputLabel class="dark:text-gray-300 mx-4 my-2" value="Cantidad" />
            <TextInput
                    id="quantity"
                    v-model="form.quantity"
                    type="number"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
            <InputLabel class="dark:text-gray-300 mx-4 my-2" value="Concepto" />
            <TextInput
                    id="concept"
                    v-model="form.concept"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <PrimaryButton class="my-4 bg-stone-800">Agregar</PrimaryButton>
        </div>
     </div>
      </form>
       </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';

export default {
    data(){
        const form = useForm({
        quantity: null,
        concept: "",
      
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
    },
    props:{

    },
    methods:{
        store() {
      this.form.post(this.route('incomes.store'));
    },
    },
}
</script>