<template>
  <AppLayout title="Deudas">
    <div class="flex justify-between">
      <header class="block text-3xl text-gray-100 bg-stone-900 mt-5 ml-4">
        Deudas
      </header>
      <Link :href="route('debts.create')"
        ><PrimaryButton class="mr-2 my-4">Crear +</PrimaryButton></Link
      >
    </div>

    <SearchInput 
      :filters="filters"
      filterURL="/debts"
       />

    <div
      v-for="debt in debts.data"
      :key="debt.id"
      class="
        flex flex-col
        container
        mx-auto
        bg-stone-700
        border-2
        rounded-lg
        h-56
        mt-4
        w-[90%]
        relative
      "
      :class="debt.payed_at ? 'border-green-600' : 'border-red-600'"
    >
      <button
        @click="delete_confirm = true; item_to_delete = debt;"
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
      <div class="flex flex-row space-x-5 px-2 py-2 text-lg">
        <span class="font-extrabold uppercase"> {{ debt.lender }} </span>
        <span> ${{ debt.quantity }} </span>
        <span> Fecha promesa: {{ debt.pay_date }} </span>
      </div>
      <div class="flex flex-col space-x-5 px-4 py-3 text-lg">
        <span> {{ debt.reason }} </span>
        <span v-if="debt.payed_at"> Pagado el: {{ debt.payed_at }} </span>
      </div>
      <SecondaryButton
      v-if="!debt.payed_at"
        class="
          flex
          justify-center
          bg-green-700
          mx-20
          text-center text-white
          font-bold
          mt-2
          mb-5
        "
      >
        Pagado
      </SecondaryButton>
      <div>
        <p class="flex justify-end px-2 text-sm text-gray-400"> {{ debt.created_at }} </p>
      </div>
    </div>
    <Pagination :pagination="debts"/>

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
import PrimaryButton from "@/components/PrimaryButton.vue";
import SecondaryButton from "@/components/SecondaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';
import Pagination from "@/components/Pagination.vue";
import ConfirmationModal from "@/components/ConfirmationModal.vue";
import SearchInput from "@/components/SearchInput.vue";

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
    debts: Object,
    filters: Object,
    filterURL: String,
  },
  methods: {
    delete() {
      this.$inertia.delete(
        this.route("debts.destroy", this.item_to_delete)
      );
      this.delete_confirm = false;
  },
  },
};
</script>