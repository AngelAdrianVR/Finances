<template>
  <AppLayout title="Crear Inversión">
    <div class="flex space-x-7 ml-2">
      <Link
        :href="route('investments.index')"
        class="flex items-center mt-2 text-indigo-600"
      >
        <i class="fas fa-long-arrow-alt-left text-lg"></i>
        <span class="ml-2">Atrás</span>
      </Link>
      <header class="block text-3xl text-gray-100 bg-stone-900 mt-5">
        Crear Inversión
      </header>
    </div>
    <div class="container mx-auto bg-stone-700 rounded-lg h-2/3 mt-8 w-[90%]">
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
              value="Plataforma"
            />
            <TextInput
              id="platform"
              v-model="form.platform"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.platform" />
            <InputLabel
              class="dark:text-gray-300 mx-4 my-1 text-lg"
              value="Tipo"
            />
            <TextInput
              id="type"
              v-model="form.type"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.type" />
            <InputLabel
              class="dark:text-gray-300 mx-4 my-1 text-lg"
              value="Ganancia"
            />
            <TextInput
              id="profit"
              v-model="form.profit"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.profit" />
            <InputLabel
              class="dark:text-gray-300 mx-4 my-1 text-lg"
              value="Fecha de liberación"
            />
            <TextInput
              id="release_date"
              v-model="form.release_date"
              type="date"
              class="mt-1 block w-full"
              required
            />
            <InputError :message="$page.props?.errors.release_date" />
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
      platform: "",
      type: "",
      profit: "",
      release_date: "",
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
      this.form.post(this.route("investments.store"));
    },
  },
};
</script>