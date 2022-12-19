<template>
    <div class="flex flex-col justify-center py-7 p-5">
  <!--==== frist div begins here ====--->
    <div class="w-full mx-auto">
      <div class="bg-gray-400 my-6">
        <table class="text-left w-full border-collapse rounded-lg text-gray-800"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
          <thead>
            <tr>
              <th :class="type[color]" class="py-4 px-6 font-bold uppercase text-sm border-b-2">Mes</th>
              <th :class="type[color]" class="py-4 px-6 text-center  font-bold uppercase text-sm  border-b-2">Total</th>
              <th :class="type[color]" class="py-4 px-6 text-center  font-bold uppercase text-sm  border-b-2"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(month,index) in months" :key="index" class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">{{ month }}</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                {{data[index]}}
              </td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                <Link :href="route('statistics.resume')"><PrimaryButton class="!bg-indigo-500">Ver</PrimaryButton></Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
    <!--==== frist div ends here ====--->
    </div>
</template>

<script>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    data(){
        return{
            months:[
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre',
            ],
            type:[
              'bg-green-300 text-green-800 border-green-600',
              'bg-red-300 text-red-800 border-red-600',
              'bg-purple-300 text-purple-800 border-purple-600',
              'bg-orange-300 text-orange-800 border-orange-600',
              'bg-pink-300 text-pink-800 border-pink-600',
            ],
        };
    },
    props:{
      color: Number,
      data: Array,

    },
    components:{
      PrimaryButton,
      Link,
    },
    methods:{

    },
}
</script>