<template>
  <AppLayout title="Resumen Mendual">
    <div class="flex justify-between">
      <header class="block text-3xl text-gray-100 mt-5 ml-4">
        Resumen de Ingresos Mensual
      </header>
    </div>
       
    <div
      v-for="(income) in incomes"
      :key="income.id"
      class="
        flex flex-col
        container
        mx-auto
        rounded-lg
        h-auto
        mt-4
        w-[90%]
        relative
        bg-stone-800
        shadow-md shadow-stone-400/100
      "
    >
      <button
        @click="delete_confirm = true; item_to_delete = income;"
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
      <div class="flex flex-col space-x-5 px-2 py-2 text-sm">
        <span class="font-bold uppercase">Concepto: {{ income.concept }} </span>
        <span>Cantidad: ${{ income.quantity }} </span>
      </div>
      <div class="flex flex-col space-x-5 px-4 text-sm">
        <p class="flex justify-end px-2 text-sm text-gray-400"> {{ income.created_at }} </p>
      </div>
    </div>
    
    <p v-if="!incomes.length" class="text-sm text-gray-200 text-center py-6">No hay elementos para mostrar</p>

  <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
      <template #title>
        <div>¿Deseas continuar?</div>
      </template>
      <template #content>
        <div>
          Estás a punto de eliminar un registro de Deuda, una vez realizado ya no se podrá
          recuperar.
        </div>
      </template>
      <template #footer>
        <div class="flex justify-end">
          <button @click="this.delete()" class="px-2 py-1 font-semibold border rounded border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition duration-200 mr-2">Eliminar</button>
          <button class="px-2 py-1 font-semibold border rounded border-gray-500 text-gray-500 hover:bg-gray-100 transition duration-200" @click="delete_confirm = false">
            Cancelar
          </button>
        </div>
      </template>
    </ConfirmationModal>

  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';
import Pagination from "@/Components/Pagination.vue";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";
import SearchInput from "@/Components/SearchInput.vue";

export default {
  data() {
    return {
      delete_confirm: false,
      item_to_delete: {},
    };
  },
  components: {
    AppLayout,
    PrimaryButton,
    Link,
    SecondaryButton,
    Pagination,
    ConfirmationModal,
    SearchInput,
  },
  props: {
    incomes: Array,
    filters: Object,
    filterURL: String,
  },
  methods: {
    delete() {
      this.$inertia.delete(
        this.route("incomes.destroy", this.item_to_delete)
      );
      this.delete_confirm = false;
  },
  },
};
</script>