
<template>
    <AppLayout title="Dashboard">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome :data="[total_incomes,total_expenses,total_loans,total_debts,total_investments]"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

export default {
    data(){
        return{

        }
    },
    components:{
        AppLayout,
        Welcome,
    },
    props:{
        total_incomes: String,
        total_expenses: String,
        total_loans: String,
        total_debts: String,
        total_investments: String,
    },
}
</script>