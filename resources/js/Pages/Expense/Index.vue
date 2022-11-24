<template>
    <AppLayout title="Egresos">
       <div class="flex justify-between">
       <header class="block text-3xl text-gray-100 bg-stone-900 mt-5 ml-4">Egresos</header>
        <Link :href="route('expenses.create')"><PrimaryButton class="mr-2 my-4">Crear +</PrimaryButton></Link>
       </div>

       <div v-for="expense in expenses" :key="expense.id" class="container mx-auto bg-stone-700 rounded-lg h-20 mt-8 w-[90%]">
            <div class="flex flex-row space-x-5 px-4 py-3 text-lg">
                <span class="font-bold"> {{ expense.concept }} </span>
                <span> ${{ expense.quantity }} </span>
                <span> {{ expense.created_at }} </span>
                <span> {{ expense.category }} </span>
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
        expenses: Object,
    },
    methods:{

    },
}
</script>