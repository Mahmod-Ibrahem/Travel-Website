<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Inclusions</h1>
        <RouterLink :to="{ name: 'app.inclusions.create' }" class="py-2 px-4 border border-transparent text-sm font-medium
      rounded-md text-white bg-indigo-600 hover:bg-indigo-700
      focus:outline-none focus:ring-2 focus:ring-offset-2
      focus:ring-indigo-500">
            Add new Inclusion
        </RouterLink>
    </div>
    <InclusionsTable></InclusionsTable>
</template>
<script setup>
import InclusionsTable from "./InclusionsTable.vue";
</script>

<style scoped></style>
