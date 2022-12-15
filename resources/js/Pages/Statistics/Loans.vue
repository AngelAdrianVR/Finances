<template>
  <AppLayout title="Estadisticas-Préstamos">
        <YearTable :color="2" :data="filtered_loans"/>
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
    filtered_loans: Array,
  },
  methods: {

  },
};
</script>