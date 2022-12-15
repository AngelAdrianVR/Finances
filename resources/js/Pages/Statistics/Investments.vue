<template>
  <AppLayout title="Estadisticas-Inversiones">
        <YearTable :color="4" :data="filtered_investments"/>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Pagination from "@/Components/Pagination.vue";
import YearTable from "@/Components/YearTable.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  data() {
    return {

      
      };
  },
  components: {
    AppLayout,
    YearTable,
    PrimaryButton,
    Pagination,
    Link,

  },
  props: {
    filtered_investments: Array,
  },
  methods: {

  },
};
</script>