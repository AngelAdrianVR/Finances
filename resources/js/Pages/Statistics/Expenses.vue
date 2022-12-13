<template>
  <AppLayout title="Estadisticas-Egresos">
        <YearTable :color="1" :data="filtered_expenses"/>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/components/PrimaryButton.vue";
import Pagination from "@/components/Pagination.vue";
import YearTable from "@/components/YearTable.vue";
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
    filtered_expenses: Array,
  },
  methods: {

  },
};
</script>