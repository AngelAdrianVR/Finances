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

      <SearchInput 
      :filters="filters"
      filterURL="/investments"
       />

    <div
      v-for="(investment, index) in investments.data"
      :key="investment.id"
      class="
        flex flex-col
        container
        mx-auto
        bg-stone-700
        border-2
        rounded-lg
        h-auto
        mt-4
        w-[90%]
        relative
      "
      :class="investment.released_at ? 'border-green-600' : 'border-indigo-600'"
    >
      <button
        @click="delete_confirm = true; item_to_delete = investment;"
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
      <div class="flex flex-col space-x-5 px-4 py-3 text-lg">
        <span class="font-bold uppercase"> {{ investment.platform }} </span>
        <span>Tipo: {{ investment.type }} </span>
        <span>Cantidad: ${{ investment.quantity }} </span>
        <span>Profit: {{ investment.profit }} </span>
      </div>
      <div class="flex flex-col space-x-5 px-4 py-3 text-lg">
        <span> Fecha liberación: {{ investment.release_date }} </span>
        <span v-if="investment.released_at" class="font-bold text-left"> liberado: {{ investment.released_at }} </span>
      </div>
      <SecondaryButton
      @click="releaseInvestment(investment.id, index)"
      v-if="!investment.released_at"
        class="
          flex
          justify-center
          bg-green-700
          mx-20
          text-center text-white
          font-bold
          mt-2
          mb-3
        "
      >
        Liberado
      </SecondaryButton>
      <div>
        <p class="flex justify-end px-2 text-sm text-gray-400"> {{ investment.created_at }} </p>
      </div>
    </div>
    <Pagination :pagination="investments"/>

  <ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar un regostro de inversión. Una vez realizado ya no se podrá
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
    investments: Object,
    filters: Object,
    filterURL: String,
  },
  methods: {
    delete() {
      this.$inertia.delete(
        this.route("investments.destroy", this.item_to_delete)
      );
      this.delete_confirm = false;
  },
  async releaseInvestment(investment_id, item_index){
    try {
      const response = await axios.put(route('investments.mark-as-payed',investment_id));
      this.investments.data[item_index] = response.data.item;
    } catch (error) {
      console.log(error);      
    }
  },
  },
};
</script>