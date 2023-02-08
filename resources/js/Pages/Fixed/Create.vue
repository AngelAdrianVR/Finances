<template>
  <AppLayout title="Crear Gasto Fijo">
    <div class="flex space-x-7 ml-2">
      <Link
        :href="route('fixed.index')"
        class="flex items-center mt-2 text-indigo-600"
      >
        <i class="fas fa-long-arrow-alt-left text-lg"></i>
        <span class="ml-2">Atrás</span>
      </Link>
      <header class="block text-3xl text-gray-100 mt-5">
        Crear Gasto fijo
      </header>
    </div>
    <div class="container mx-auto bg-stone-800 rounded-lg h-auto mt-8 w-[90%] shadow-stone-400/100">
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
              class="dark:text-gray-300 mx-4 my-2 text-lg"
              value="Cantidad"
            />
            <TextInput
              id="quantity"
              v-model="form.quantity"
              type="number"
              step="0.1"
              class="mt-1 block w-full"
              required
              autofocus
            />
            <InputError :message="$page.props?.errors.quantity" />
            <InputLabel
              class="dark:text-gray-300 mx-4 my-2 text-lg"
              value="Concepto"
            />
            <TextInput
              id="concept"
              v-model="form.concept"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.concept" />

            <InputLabel
              class="dark:text-gray-300 mx-4 my-2 text-lg"
              value="Recurrencia de gasto"
            />
            <TextInput
             placeholder="Ejem. Mensual/Semanal"
              id="recurrency"
              v-model="form.recurrency"
              type="text"
              class="mt-1 block w-full mi-input"
              required
            />
            <InputError :message="$page.props?.errors.recurrency" />
            
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
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

export default {
  data() {
    const form = useForm({
      quantity: null,
      concept: "",
      recurrency: "",
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
    Link,
    InputError,
  },
  props: {
    categories: Object,
  },
  methods: {
    store() {
      this.form.post(this.route("fixed.store"));
    },
  },
};
</script>