<template>
  <AppLayout class="pb-4" title="Fijos">
    <div class="flex justify-between">
      <header class="block text-3xl text-gray-100 mt-5 ml-4">
        Gastos Fijos
      </header>
      <Link :href="route('fixed.create')"
        ><PrimaryButton class="mr-2 my-4">Crear +</PrimaryButton></Link
      >
    </div>

    <div
      v-for="fixed in fixeds.data"
      :key="fixed.id"
      class="relative
        container
        mx-auto
        rounded-lg
        h-auto
        mt-4
        w-[90%]
        bg-stone-800
        shadow-md shadow-stone-400/100
        py-2
        "
    >
      <button
        @click="delete_confirm = true; item_to_delete = fixed;"
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

      <div class="flex space-x-5 px-4 py-3 text-sm mt-3">
        <span class="font-bold uppercase"> {{ fixed.concept }} <i class="fa-solid fa-arrow-right text-white ml-3"></i> </span>
        <span>Cantidad: ${{ fixed.quantity }} </span>
      </div>
      <div>
        <p class="flex justify-end px-2 text-sm text-gray-400"> {{ fixed.created_at }} </p>
      </div>
    </div>
    <p v-if="!fixeds.data.length" class="text-sm text-gray-200 text-center py-6">No hay elementos para mostrar</p>
    <Pagination :pagination="fixeds" />

  <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar un registro de gasto fijo. Una vez realizado ya no se podrá
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
    Pagination,
    ConfirmationModal,
    SearchInput,
  },
  props: {
    fixeds: Object,
  },
  methods: {
       delete() {
      this.$inertia.delete(
        this.route("fixed.destroy", this.item_to_delete)
      );
      this.delete_confirm = false;
  },
},
};
</script>