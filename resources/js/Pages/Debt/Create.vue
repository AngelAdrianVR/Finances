<template>
  <AppLayout title="Crear Deuda">
    <div class="flex space-x-7 ml-2">
      <Link
        :href="route('debts.index')"
        class="flex items-center mt-2 text-indigo-600"
      >
        <i class="fas fa-long-arrow-alt-left text-lg"></i>
        <span class="ml-2">Atrás</span>
      </Link>
      <header class="block text-3xl text-gray-100 mt-5">
        Crear Deuda
      </header>
    </div>
    <div class="container mx-auto bg-stone-800 rounded-lg h-96 mt-8 w-[90%] shadow-stone-400/100">
      <form @submit.prevent="store" class="mt-6">
        <div
          class="
            lg:grid
            grid-cols-2
            gap-x-3
            transition-dark
            dark:bg-slate-900
            flex flex-row
            justify-center
          "
        >
          <div class="mt-3 text-center">
            <InputLabel
              class="dark:text-gray-300 mx-4 my-1 text-lg"
              value="Cantidad"
            />
            <TextInput
              id="quantity"
              v-model="form.quantity"
              type="number"
              class="mt-1 block w-full"
              required
              autofocus
            />
            <InputError :message="$page.props?.errors.quantity" />
            <InputLabel
              class="dark:text-gray-300 mx-4 my-1 text-lg"
              value="Razón"
            />
            <TextInput
              id="reason"
              v-model="form.reason"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.reason" />

            <InputLabel
              class="dark:text-gray-300 mx-4 my-1 text-lg"
              value="Prestador"
            />
            <TextInput
              id="lender"
              v-model="form.lender"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.lender" />

            <InputLabel
              class="dark:text-gray-300 mx-4 my-1 text-lg"
              value="Fecha de pago"
            />
            <TextInput
              id="pay_date"
              v-model="form.pay_date"
              type="date"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.pay_date" />
            <PrimaryButton :disabled="form.processing" class="my-4 bg-stone-800">Agregar</PrimaryButton>

          </div>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

export default {
  data() {
    const form = useForm({
      quantity: null,
      reason: "",
      lender: "",
      pay_date: "",
    });
    return {
      form,
    };
  },
  components: {
    AppLayout,
    PrimaryButton,
    InputLabel,
    TextInput,
    InputError,
    Link,
    useForm,
  },
  props: {
    
  },
  methods: {
    store() {
      this.form.post(this.route("debts.store"));
    },
  },
};
</script>