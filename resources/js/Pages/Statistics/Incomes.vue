<template>
  <AppLayout title="Estadisticas-Ingresos">
    <YearTable :color="0" />

    <Chart />

  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/components/PrimaryButton.vue";
import Pagination from "@/components/Pagination.vue";
import YearTable from "@/components/YearTable.vue";
import Chart from "@/components/Chart.vue";
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
  props: {},
  methods: {},
};
</script>
