<template>
    <AppLayout title="Estadísticas">
    <h1 class="text-3xl text-gray-100 bg-stone-900 py-3 pl-3">Estadísticas</h1>
               <!-- component -->
<!---===================== FIRST ROW CONTAINING THE  STATS CARD STARTS HERE =============================-->
  <div class="flex flex-col md:flex-row justify-center bg-stone-700 py-10 mt-4 mx-2 space-y-4 rounded-md">
    
    <!---== First Stats Container ====--->
     <Link :href="route('statistics.incomes')" class="w-full">
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-green-300 flex items-center justify-between border-b-2 border-green-600">
        <p class="mr-0 text-green-800 text-lg pl-5">INGRESOS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">${{ total_incomes }}</p>
    </div>
  </div>
    </Link>
      <!---== First Stats Container ====--->

    <!---== Second Stats Container ====--->
    <Link :href="route('statistics.expenses')" class="w-full">
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-red-300 flex items-center justify-between border-b-2 border-red-600">
        <p class="mr-0 text-red-800 text-lg pl-5">EGRESOS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">${{ total_expenses }} </p>
    </div>
  </div>
  </Link>
    <!---== Second Stats Container ====--->

  <!---== Third Stats Container ====--->
  <Link :href="route('statistics.loans')" class="w-full">
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-purple-300 flex items-center justify-between border-b-2 border-purple-600">
        <p class="mr-0 text-purple-800 text-lg pl-5">PRESTAMOS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">${{ total_loans }} </p>
    </div>
  </div>
  </Link>
  <!---== Third Stats Container ====--->

  <!---== Fourth Stats Container ====--->
  <Link :href="route('statistics.debts')" class="w-full">
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-orange-300 flex items-center justify-between border-b-2 border-orange-600">
        <p class="mr-0 text-orange-800 text-lg pl-5">DEUDAS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">${{ total_debts }} </p>
    </div>
  </div>
  </Link>
  <!---== Fourth Stats Container ====--->

  <!---== fiveth Stats Container ====--->
  <Link :href="route('statistics.investments')" class="w-full">
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-pink-300 flex items-center justify-between border-b-2 border-pink-600">
        <p class="mr-0 text-pink-800 text-lg pl-5">INVERSIONES</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">${{ total_investments }} </p>
    </div>
  </div>
  </Link>
</div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import YearTable from '@/components/YearTable.vue';
import { Link } from "@inertiajs/inertia-vue3";

export default {
    data(){
        return{

        }
    },
    components:{
        AppLayout,
        YearTable,
        Link,

    },
    props:{
      total_incomes: String,
      total_expenses: String,
      total_loans: String,
      total_debts: String,
      total_investments: String,
    },
    methods:{

    },
}
</script>