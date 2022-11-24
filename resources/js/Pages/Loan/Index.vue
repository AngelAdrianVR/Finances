<template>
    <AppLayout title="Préstamos">
       <div class="flex justify-between">
       <header class="block text-3xl text-gray-100 bg-stone-900 mt-5 ml-4">Préstamos</header>
        <Link :href="route('loans.create')"><PrimaryButton class="mr-2 my-4">Crear +</PrimaryButton></Link>
       </div>

       <div class="container mx-auto bg-stone-700 rounded-lg h-20 mt-8 w-[90%]">
            <div class="flex flex-row space-x-5 px-4 py-3 text-lg">
                <span class="font-bold"> {{ 'Concepto' }} </span>
                <span> {{ '$Cantidad' }} </span>
                <span> {{ 'Fecha' }} </span>
            </div>
       </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    data(){
        return{

        }
    },
    components:{
        AppLayout,
        PrimaryButton,
        Link,
    },
    props:{
    },
    methods:{

    },
}
</script>