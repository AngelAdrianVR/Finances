
<template>
  <div>
    <h1 class="text-3xl text-gray-100 bg-stone-900 py-3 pl-3">Inicio</h1>
    <div class="p-6 sm:px-20 bg-stone-700 text-gray-200">
      <!-- component -->
      <!-- This is an example component -->

      <div
        class="
          flex
          md:flex-row
          flex-col
          space-y-2
          sm:space-x-2
          w-full
          items-center
          justify-center
          min-h-screen
        "
      >
        <Link :href="route('statistics.index')" class="w-full">
          <div
            class="
              flex flex-wrap flex-row
              sm:flex-col
              justify-center
              items-center
              w-full
              sm:w-1/4
              p-5
              bg-gray-700
              rounded-md
              shadow-xl
              border-l-4 border-blue-300
            "
          >
            <div class="flex justify-between w-full">
              <div>
                <div class="p-2">
                  <i class="fa-solid fa-chart-simple text-lg text-gray-400"></i>
                </div>
              </div>
              <div>
                <div
                  style="padding-top: 0.1em; padding-bottom: 0.1rem"
                  class="
                    flex
                    items-center
                    text-xs
                    px-3
                    bg-blue-300
                    text-blue-800
                    rounded-full
                  "
                >
                  Estadísticas
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-center items-center">
              <i class="fa-solid fa-chart-simple text-5xl text-gray-200"></i>
              <span class="font-semibold">Estadísticas</span>
            </div>
          </div>
        </Link>

        <Link :href="route('incomes.index')" class="w-full">
          <div
            class="
              flex flex-wrap flex-row
              sm:flex-col
              justify-center
              items-center
              w-full
              sm:w-1/4
              p-5
              bg-gray-700
              rounded-md
              shadow-xl
              border-l-4 border-green-300
            "
          >
            <div class="flex justify-between w-full">
              <div>
                <div class="p-2">
                  <i class="fa-solid fa-coins text-lg text-gray-400"></i>
                </div>
              </div>
              <div>
                <div
                  style="padding-top: 0.1em; padding-bottom: 0.1rem"
                  class="
                    flex
                    items-center
                    text-xs
                    px-3
                    bg-green-300
                    text-green-800
                    rounded-full
                  "
                >
                  ${{ data[0] }}
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-center items-center">
              <i class="fa-solid fa-coins text-5xl text-gray-200"></i>
              <span class="font-semibold">Ingresos</span>
            </div>
          </div>
        </Link>

        <Link :href="route('expenses.index')" class="w-full">
          <div
            class="
              flex flex-wrap flex-row
              sm:flex-col
              justify-center
              items-center
              w-full
              sm:w-1/4
              p-5
              bg-gray-700
              rounded-md
              shadow-xl
              border-l-4 border-red-400
            "
          >
            <div class="flex justify-between w-full">
              <div>
                <div class="p-2">
                  <i
                    class="
                      fa-solid fa-hand-holding-dollar
                      text-lg text-gray-400
                    "
                  ></i>
                </div>
              </div>
              <div>
                <div
                  style="padding-top: 0.1em; padding-bottom: 0.1rem"
                  class="
                    flex
                    items-center
                    text-xs
                    px-3
                    bg-red-300
                    text-red-800
                    rounded-full
                  "
                >
                  ${{ data[1] }}
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-center items-center">
              <i
                class="fa-solid fa-hand-holding-dollar text-5xl text-gray-200"
              ></i>
              <span class="font-semibold">Egresos</span>
            </div>
          </div>
        </Link>

        <Link :href="route('loans.index')" class="w-full">
          <div
            class="
              flex flex-wrap flex-row
              sm:flex-col
              justify-center
              items-center
              w-full
              sm:w-1/4
              p-5
              bg-gray-700
              rounded-md
              shadow-xl
              border-l-4 border-purple-300
            "
          >
            <div class="flex justify-between w-full">
              <div>
                <div class="p-2">
                  <i class="fa-solid fa-handshake text-lg text-gray-400"></i>
                </div>
              </div>
              <div>
                <div
                  style="padding-top: 0.1em; padding-bottom: 0.1rem"
                  class="
                    flex
                    items-center
                    text-xs
                    px-3
                    bg-purple-300
                    text-purple-800
                    rounded-full
                  "
                >
                  ${{ data[2] }}
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-center items-center">
              <i class="fa-solid fa-handshake text-5xl text-gray-200"></i>
              <span class="font-semibold">Préstamos</span>
            </div>
          </div>
        </Link>

        <Link :href="route('debts.index')" class="w-full">
          <div
            class="
              flex flex-wrap flex-row
              sm:flex-col
              justify-center
              items-center
              w-full
              sm:w-1/4
              p-5
              bg-gray-700
              rounded-md
              shadow-xl
              border-l-4 border-orange-300
            "
          >
            <div class="flex justify-between w-full">
              <div>
                <div class="p-2">
                  <i class="fa-solid fa-credit-card text-lg text-gray-400"></i>
                </div>
              </div>
              <div>
                <div
                  style="padding-top: 0.1em; padding-bottom: 0.1rem"
                  class="
                    flex
                    items-center
                    text-xs
                    px-3
                    bg-orange-300
                    text-orange-800
                    rounded-full
                  "
                >
                  ${{ data[3] }}
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-center items-center">
              <i class="fa-solid fa-credit-card text-5xl text-gray-200"></i>
              <span class="font-semibold">Deudas</span>
            </div>
          </div>
        </Link>

        <Link :href="route('investments.index')" class="w-full">
          <div
            class="
              flex flex-wrap flex-row
              sm:flex-col
              justify-center
              items-center
              w-full
              sm:w-1/4
              p-5
              bg-gray-700
              rounded-md
              shadow-xl
              border-l-4 border-rose-300
            "
          >
            <div class="flex justify-between w-full">
              <div>
                <div class="p-2">
                  <i class="fa-solid fa-piggy-bank text-lg text-gray-400"></i>
                </div>
              </div>
              <div>
                <div
                  style="padding-top: 0.1em; padding-bottom: 0.1rem"
                  class="
                    flex
                    items-center
                    text-xs
                    px-3
                    bg-rose-300
                    text-rose-800
                    rounded-full
                  "
                >
                  ${{ data[4] }}
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-center items-center">
              <i class="fa-solid fa-piggy-bank text-5xl text-gray-200"></i>
              <span class="font-semibold">Inversiones</span>
            </div>
          </div>
        </Link>

        <!-- <Link :href="route('investments.index')" class="w-full">
          <div
            class="
              flex flex-wrap flex-row
              sm:flex-col
              justify-center
              items-center
              w-full
              sm:w-1/4
              p-5
              bg-gray-700
              rounded-md
              shadow-xl
              border-l-4 border-cyan-300
            "
          >
            <div class="flex justify-between w-full">
              <div>
                <div class="p-2">
                  <i class="a-solid fa-wallet text-lg text-gray-400"></i>
                </div>
              </div>
              <div>
                <div
                  style="padding-top: 0.1em; padding-bottom: 0.1rem"
                  class="
                    flex
                    items-center
                    text-xs
                    px-3
                    bg-cyan-300
                    text-cyan-800
                    rounded-full
                  "
                >
                  ${{ data[4] }}
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-center items-center">
              <i class="fa-solid fa-wallet text-5xl text-gray-200"></i>
              <span class="font-semibold">Billetera</span>
            </div>
          </div>
        </Link> -->
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  data() {
    return {};
  },
  components: {
    Link,
  },
  props: {
    data: Array,
  },
  methods: {},
};
</script>