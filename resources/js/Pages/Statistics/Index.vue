<template>
    <AppLayout title="Estadísticas">
    <h1 class="text-3xl text-gray-100 bg-stone-900 py-3 pl-3">Estadísticas</h1>
               <!-- component -->
<!---===================== FIRST ROW CONTAINING THE  STATS CARD STARTS HERE =============================-->
  <div class="flex flex-col md:flex-row justify-center bg-stone-700 py-10 mt-4 mx-2 space-y-4 rounded-md">
    <!---== First Stats Container ====--->
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-green-300 flex items-center justify-between border-b-2 border-green-600">
        <p class="mr-0 text-green-800 text-lg pl-5">INGRESOS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">$20,456</p>
    </div>
  </div>
      <!---== First Stats Container ====--->

    <!---== Second Stats Container ====--->
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-red-300 flex items-center justify-between border-b-2 border-red-600">
        <p class="mr-0 text-red-800 text-lg pl-5">EGRESOS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">$20,456</p>
    </div>
  </div>
    <!---== Second Stats Container ====--->

  <!---== Third Stats Container ====--->
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-purple-300 flex items-center justify-between border-b-2 border-purple-600">
        <p class="mr-0 text-purple-800 text-lg pl-5">PRESTAMOS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">$20,456</p>
    </div>
  </div>
  <!---== Third Stats Container ====--->

  <!---== Fourth Stats Container ====--->
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-orange-300 flex items-center justify-between border-b-2 border-orange-600">
        <p class="mr-0 text-orange-800 text-lg pl-5">DEUDAS</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">$20,456</p>
    </div>
  </div>
  <!---== Fourth Stats Container ====--->

  <!---== fiveth Stats Container ====--->
  <div class="container mx-auto">
    <div class="rounded-lg w-80 text-gray-700 bg-gray-400 max-w-xs mx-auto overflow-hidden shadow-lg shadow-stone-800/100 hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
      <div class="h-12 bg-pink-300 flex items-center justify-between border-b-2 border-pink-600">
        <p class="mr-0 text-pink-800 text-lg pl-5">INVERSIONES</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-white">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5">$20,456</p>
    </div>
  </div>
  <!---== fiveth Stats Container ====--->
</div>
<!---===================== FIRST ROW CONTAINING THE  STATS CARD ENDS HERE =============================-->

<!------===================== SECOND ROW CONTAINING THE TABLE STATS STARTS HERE =============================-->
<div class="flex justify-center bg-gray-100 py-10 p-5">
  <!--==== frist div begins here ====--->
  <div class="container mr-5 ml-2 mx-auto bg-white shadow-xl">
    <div class="w-11/12 mx-auto">
      <div class="bg-white my-6">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
          <thead>
            <tr>
              <th class="py-4 px-6 bg-purple-400 font-bold uppercase text-sm text-white border-b border-grey-light">KEYWORDS</th>
              <th class="py-4 px-6 text-center bg-purple-400 font-bold uppercase text-sm text-white border-b border-grey-light">TOTAL ENTERIES</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Bible</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                11980
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Blah</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                340
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Blah</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                901
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Blah</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                11950
              </td>
            </tr>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">Blah</td>
              <td class="py-4 px-6 text-center border-b border-grey-light">
                459
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
        </div>
    <!--==== frist div ends here ====--->

    <!--==== Second div begins here ====--->
    <div class="container mr-5 mx-auto bg-white shadow-xl">
      <div class="w-11/12 mx-auto">
        <div class="bg-white my-6">
          <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
              <tr>
                <th class="py-4 px-6 bg-purple-400 font-bold uppercase text-sm text-white border-b border-grey-light">MSISDN</th>
                <th class="py-4 px-6 text-center bg-purple-400 font-bold uppercase text-sm text-white border-b border-grey-light">ENTRIES</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">26809304030</td>
                <td class="py-4 px-6 text-center border-b border-grey-light">
                  495,455
                </td>
              </tr>
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">26809304030</td>
                <td class="py-4 px-6 text-center border-b border-grey-light">
                  495,455
                </td>
              </tr>
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">26809304030</td>
                <td class="py-4 px-6 text-center border-b border-grey-light">
                  495,455
                </td>
              </tr>
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">26809304030</td>
                <td class="py-4 px-6 text-center border-b border-grey-light">
                  32,333
                </td>
              </tr>
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">26809304030</td>
                <td class="py-4 px-6 text-center border-b border-grey-light">
                  31,199
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
          </div>
      <!--==== Second div ends here ====--->

      <!--==== Third div begins here ====--->
      <div class="container mx-auto bg-white shadow-xl">
        <div class="w-11/12 mx-auto">
          <div class="bg-white my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
              <thead>
                <tr>
                  <th class="py-4 px-6 bg-purple-400 font-bold uppercase text-sm text-white border-b border-grey-light">MSISDN</th>
                  <th class="py-4 px-6 text-center bg-purple-400 font-bold uppercase text-sm text-white border-b border-grey-light">POINTS</th>
                </tr>
              </thead>
              <tbody>
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">28679609009</td>
                  <td class="py-4 text-center px-6 border-b border-grey-light">
                    11,290
                  </td>
                </tr>
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">28679609009</td>
                  <td class="py-4 text-center px-6 border-b border-grey-light">
                    9,230
                  </td>
                </tr>
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">28679609009</td>
                  <td class="py-4 px-6 text-center border-b border-grey-light">
                    234
                  </td>
                </tr>
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">28679609009</td>
                  <td class="py-4 px-6 text-center border-b border-grey-light">
                    56,230
                  </td>
                </tr>
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">28679609009</td>
                  <td class="py-4 px-6 text-center border-b border-grey-light">
                    323
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
            </div>
        <!--==== Third div ends here ====--->
    </div>
<!---------===================== SECOND ROW CONTAINING THE TABLE STATS ENDS HERE =============================-->
    
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    data(){
        return{

        }
    },
    components:{
        AppLayout,
    },
    props:{

    },
    methods:{

    },
}
</script>