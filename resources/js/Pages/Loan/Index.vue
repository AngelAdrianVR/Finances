<template>
  <AppLayout title="Préstamos">
    <div class="flex justify-between">
      <header class="block text-3xl text-gray-100 bg-stone-900 mt-5 ml-4">
        Préstamos
      </header>
      <Link :href="route('loans.create')"
        ><PrimaryButton class="mr-2 my-4">Crear +</PrimaryButton></Link
      >
    </div>

    <SearchInput 
      :filters="filters"
      filterURL="/loans"
       />

    <div
      v-for="(loan, index) in loans.data"
      :key="loan.id"
      class="
        flex flex-col
        container
        mx-auto
        bg-stone-700
        border-2
        rounded-lg
        h-auto
        mt-8
        w-[90%]
        relative
      "
      :class="loan.payed_at ? 'border-green-600' : 'border-red-600'"
    >
      <button
        @click="delete_confirm = true; item_to_delete = loan;"
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
      <div class="flex flex-row space-x-5 px-4 py-3 text-sm">
        <span class="font-bold uppercase"> {{ loan.debtor }} </span>
        <span> ${{ loan.quantity }} </span>
      </div>
      <div class="flex flex-col space-x-5 px-4 py-3 text-base">
        <span > Fecha promesa: {{ loan.pay_date }} </span>
        <span class="font-bold" v-if="loan.payed_at"> Pagado el: {{ loan.payed_at }} </span>
      </div>
      <SecondaryButton
      @click="payLoan(loan.id, index)"
        v-if="!loan.payed_at"
        class="
          flex
          justify-center
          bg-green-700
          mx-20
          text-center text-white
          font-bold
          mb-4
        "
      >
        Pagado
      </SecondaryButton>
      <div>
        <p class="flex justify-end px-2 text-sm text-gray-400"> {{ loan.created_at }} </p>
      </div>
    </div>
    <p v-if="!loans.data.length" class="text-sm text-gray-200 text-center py-6">No hay elementos para mostrar</p>
    <Pagination :pagination="loans"/>

    <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar un registro de préstamo. Una vez realizado ya no se podrá
        recuperar
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
import { Inertia } from "@inertiajs/inertia";
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
    loans: Object,
    filters: Object,
    filterURL: String,
  },
  methods: {
    delete() {
      this.$inertia.delete(
        this.route("loans.destroy", this.item_to_delete)
      );
      this.delete_confirm = false;
  },
  async payLoan(loan_id, item_index){
    try {
      const response = await axios.put(route('loans.mark-as-payed',loan_id));
      this.loans.data[item_index] = response.data.item;
    } catch (error) {
      console.log(error);      
    }
  },

  },
};
</script>