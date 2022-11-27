<template>
  <AppLayout title="Inversiones">
    <div class="flex justify-between">
      <header class="block text-3xl text-gray-100 bg-stone-900 mt-5 ml-4">
        Inversiones
      </header>
      <Link :href="route('investments.create')"
        ><PrimaryButton class="mr-2 my-4">Crear +</PrimaryButton></Link
      >
    </div>

    <div
      v-for="investment in investments"
      :key="investment.id"
      class="
        flex flex-col
        container
        mx-auto
        bg-stone-700
        rounded-lg
        h-60
        mt-8
        w-[90%]
        relative
      "
    >
      <button
        @click="deleteItem(investment)"
        class="
          text-red-500 text-lg
          font-bold
          h-6
          w-6
          rounded-full
          opacity-75
          flex
          justify-center
          items-center
          absolute
          top-0
          right-0
        "
      >
        x
      </button>
      <div class="flex flex-row space-x-5 px-4 py-3 text-lg">
        <span class="font-bold"> {{ investment.platform }} </span>
        <span> {{ investment.type }} </span>
        <span> ${{ investment.quantity }} </span>
        <span> ${{ investment.profit }} </span>
      </div>
      <div class="flex flex-row space-x-5 px-4 py-3 text-lg">
        <span> Fecha liberación: {{ investment.release_date }} </span>
        <span class="text-sm"> creado: {{ investment.created_at }} </span>
      </div>
      <SecondaryButton
        class="
          flex
          justify-center
          bg-green-600
          mx-20
          text-center text-white
          font-bold
        "
      >
        Liberado
      </SecondaryButton>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/components/PrimaryButton.vue";
import SecondaryButton from "@/components/SecondaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';

export default {
  data() {
    return {};
  },
  components: {
    AppLayout,
    PrimaryButton,
    Link,
    SecondaryButton,
  },
  props: {
    investments: Object,
  },
  methods: {
    deleteItem(investment) {
      Inertia.delete(route("investments.destroy", investment));
    },
  },
};
</script>