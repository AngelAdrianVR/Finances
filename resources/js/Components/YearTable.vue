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
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Enero</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                11980
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Febrero</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                340
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Marzo</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                901
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Abril</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                11950
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Mayo</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Junio</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Julio</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Agosto</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Septiembre</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Octubre</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Noviembre</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Diciembre</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
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

    },
    methods:{

    },
}
</script>