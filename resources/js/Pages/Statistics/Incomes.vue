<template>
  <AppLayout title="Estadisticas-Ingresos">
    <YearTable :color="0" :data="filtered_incomes"/>

    <Chart />

  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Pagination from "@/Components/Pagination.vue";
import YearTable from "@/Components/YearTable.vue";
import Chart from "@/Components/Chart.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  data() {
    return {};
  },
  components: {
    AppLayout,
    YearTable,
    PrimaryButton,
    Pagination,
    Link,
    Chart,
  },
  props: {
    filtered_incomes: Array,
  },
  methods: {},
};
</script>
